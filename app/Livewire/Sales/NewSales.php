<?php

namespace App\Livewire\Sales;

use Livewire\Component;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;



class NewSales extends Component
{
    public $medicine_id, $quantity, $sale_price, $purchase_price, $discount, $date_of_sale, $customer_id;
    public $new_customer_name, $new_customer_whatsapp, $new_customer_email;
    public $sale_id;
    public $customer_type = "old";

    private function resetInputFields()
    {
        $this->medicine_id = '';
        $this->quantity = '';
        $this->sale_price = '';
        $this->purchase_price = '';
        $this->discount = '';
        $this->date_of_sale = '';
        $this->customer_id = '';
        $this->new_customer_name = '';
        $this->new_customer_whatsapp = '';
        $this->new_customer_email = '';
        $this->sale_id = null;
    }
    


    public function saveSale()
    {
        $rules = [
            'medicine_id' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'sale_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'discount' => 'nullable|integer',
            'date_of_sale' => 'required|date',
            'customer_type' => 'required',
        ];
    
        // Add conditional rules based on customer type
        if ($this->customer_type === 'old') {
            $rules['customer_id'] = 'required|exists:customers,id';
        } elseif ($this->customer_type === 'new') {
            $rules['new_customer_name'] = 'required|string|max:255';
            $rules['new_customer_whatsapp'] = 'required|string|max:20';
            $rules['new_customer_email'] = 'nullable|email|max:255';
        }
    
        // Validate dynamically
        $this->validate($rules);
    
        DB::transaction(function () {
            if ($this->customer_type === 'new') {
                // Save new customer details
                $newCustomer = Customer::create([
                    'name' => $this->new_customer_name,
                    'whatsapp' => $this->new_customer_whatsapp,
                    'email' => $this->new_customer_email,
                ]);
                $this->customer_id = $newCustomer->id;
            }
    
            // Save sale details
            Sale::create([
                'medicine_id' => $this->medicine_id,
                'quantity' => $this->quantity,
                'sale_price' => $this->sale_price,
                'purchase_price' => $this->purchase_price,
                'discount' => $this->discount,
                'date_of_sale' => $this->date_of_sale,
                'customer_id' => $this->customer_id,
            ]);
    
            $this->resetInputFields();
            session()->flash('message', 'Sale added successfully.');
        });
    }
    

    
    public function render()
    {
        $stocks = Stock::all();
        $sales = Sale::latest()->get();
        $customers = Customer::all();
        return view('livewire.sales.new-sales', compact('sales', 'stocks', 'customers'))->layout('layouts.index');
    }
    public function updatedMedicineId()
    {
        $stock = Stock::find($this ->medicine_id);
        $this->sale_price = $stock ? $stock->sale_price_each : null;
        $this->purchase_price = $stock ? $stock->purchase_price_each : null;
    }
    public function update(){
        $this->updatedMedicineId();
    }
    public function cus(){
        if($this->customer_type == "old"){
            $this->customer_type = "new";
        } else {
            $this->customer_type = "old";
        }
    }
}