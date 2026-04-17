<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Paygate;
use App\Models\Salebilling;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class Salebill extends Component
{
    public $customers;
    public $titles;

    public $sales = [];

    /* 🔍 Medicine Search */
    public $medicine_search = '';
    public $medicine_results = [];

    /* Sale Fields */
    public $customer_id = null;
    public $medicine_id = null;
    public $quantity = null;
    public $price = null;
    public $medicine_discount = 0;
    public $total_price = null;
    public $total_bill = 0;

    public $payment_method;
    public $order_id = null;

    /* Customer */
    public $customer_type = 'old';
    public $new_customer_name;
    public $new_customer_whatsapp;
    public $new_customer_email;

    /* ---------------- MOUNT ---------------- */

    public function mount()
    {
        $this->customers = Customer::select('id', 'name')->get();
        $this->titles    = Paygate::all();
    }

    public function render()
    {
        return view('livewire.salebill')
            ->layout('layouts.index');
    }

    /* ---------------- FAST LIVE SEARCH ---------------- */

   /* ---------------- FAST LIVE SEARCH ---------------- */
public function updatedMedicineSearch($value)
{
    $value = trim($value);

    if ($value === '') {
        $this->medicine_results = [];
        return;
    }

    // ✅ Prefix search: match only medicines starting with the typed letters
    $this->medicine_results = Stock::select('id', 'medicineName', 'sale_price_each', 'total_items')
        ->where('total_items', '>', 0)
        ->where('medicineName', 'LIKE', "{$value}%") // starts with typed letters
        ->orderBy('medicineName')
        ->limit(10)
        ->get();
}


    public function selectMedicine($id)
    {
        $medicine = Stock::find($id);

        if (!$medicine || $medicine->total_items <= 0) {
            session()->flash('error', 'Medicine out of stock');
            return;
        }

        $this->medicine_id      = $medicine->id;
        $this->medicine_search  = $medicine->medicineName;
        $this->price            = $medicine->sale_price_each;
        $this->medicine_results = [];

        $this->calculateTotalPrice();
    }

    /* ---------------- QUANTITY VALIDATION ---------------- */

    public function updatedQuantity($value)
    {
        if (!$this->medicine_id) return;

        $stock = Stock::find($this->medicine_id);

        if ($stock && $value > $stock->total_items) {
            $this->quantity = $stock->total_items;
            session()->flash('error', 'Only ' . $stock->total_items . ' items available');
        }

        $this->calculateTotalPrice();
    }

    /* ---------------- PRICE CALC ---------------- */

    public function calculateTotalPrice()
    {
        if (!$this->quantity || !$this->price) {
            $this->total_price = null;
            return;
        }

        $gross = $this->quantity * $this->price;
        $discount = min((float)$this->medicine_discount, $gross);

        $this->total_price = $gross - $discount;
    }

    /* ---------------- CREATE ORDER SAFELY ---------------- */

    protected function ensureOrderExists()
    {
        if ($this->order_id) return;

        $order = Order::create([
            'customer_id' => $this->customer_id, // can be null
            'total_bill' => 0,
            'payment_method' => null,
            'status' => 0,
        ]);

        $this->order_id = $order->id;
    }

    /* ---------------- ADD STOCK ---------------- */

    public function addStock()
    {
        $this->validate([
            'medicine_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'medicine_discount' => 'nullable|numeric|min:0',
        ]);

        $medicine = Stock::find($this->medicine_id);

        if (!$medicine) {
            session()->flash('error', 'Medicine not found');
            return;
        }

        if ($this->quantity > $medicine->total_items) {
            session()->flash('error', 'Stock not sufficient');
            return;
        }

        $this->ensureOrderExists();

        DB::transaction(function () use ($medicine) {

            $gross = $this->quantity * $medicine->sale_price_each;
            $discount = min($this->medicine_discount ?? 0, $gross);
            $net = $gross - $discount;

            Salebilling::create([
                'order_id'    => $this->order_id,
                'medicine_id' => $medicine->id,
                'quantity'    => $this->quantity,
                'price'       => $medicine->sale_price_each,
                'discount'    => $discount,
                'total_price' => $net,
            ]);

            $medicine->decrement('total_items', $this->quantity);
        });

        $this->loadOrderSales();
        $this->calculateTotalBill();

        Order::where('id', $this->order_id)->update([
            'total_bill' => $this->total_bill
        ]);

        $this->resetMedicineFields();

        session()->flash('success', 'Item added successfully');
    }

    public function loadOrderSales()
    {
        $this->sales = Salebilling::with('stock')
            ->where('order_id', $this->order_id)
            ->latest()
            ->get();
    }

    public function calculateTotalBill()
    {
        $this->total_bill = Salebilling::where('order_id', $this->order_id)
            ->sum('total_price');
    }

    /* ---------------- CHECKOUT ---------------- */

   public function checkout()
{
    $this->validate([
        'payment_method' => 'required',
    ]);

    // Update the order with payment info
    Order::where('id', $this->order_id)->update([
        'payment_method' => $this->payment_method,
        'total_bill' => $this->total_bill,
    ]);

    // Generate the PDF first
    $pdfResponse = $this->downloadPdf($this->order_id);

    // Reset all input fields and properties after PDF
    $this->reset([
        'medicine_search',
        'medicine_results',
        'medicine_id',
        'quantity',
        'price',
        'medicine_discount',
        'total_price',
        'total_bill',
        'payment_method',
        'order_id',
        'sales',
        'customer_id',
        'customer_type',
        'new_customer_name',
        'new_customer_whatsapp',
        'new_customer_email',
    ]);

    return $pdfResponse; // return the PDF response
}

    /* ---------------- PDF ---------------- */

    public function downloadPdf($order_id)
    {
        $sales = Salebilling::with('stock')
            ->where('order_id', $order_id)
            ->get();

        $total_bill = $sales->sum('total_price');

        $pdf = Pdf::loadView('livewire.receipt-pdf', compact(
            'sales',
            'total_bill',
            'order_id'
        ))->setPaper([0, 0, 220, 310], 'portrait');

        return response()->streamDownload(
            fn () => print($pdf->output()),
            'receipt_' . $order_id . '.pdf'
        );
    }

    /* ---------------- HELPERS ---------------- */

    public function resetMedicineFields()
    {
        $this->medicine_id = null;
        $this->medicine_search = '';
        $this->quantity = null;
        $this->price = null;
        $this->medicine_discount = 0;
        $this->total_price = null;
    }

    public function delete($id)
    {
        $sale = Salebilling::find($id);

        if ($sale) {
            $sale->stock->increment('total_items', $sale->quantity);
            $sale->delete();
        }

        $this->loadOrderSales();
        $this->calculateTotalBill();
    }
}
