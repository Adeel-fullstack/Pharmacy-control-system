<?php

namespace App\Livewire\Stock;

use App\Livewire\Stock\Type as StockType;
use Livewire\Component;
use App\Models\Type;
use App\Models\Company;
use App\Models\Distributor;
use App\Models\Stock;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class NewStock extends Component
{
   use WithfileUploads;
    // standard form
    public $medicinelogo, $medicineName, $barcode, $type, $packaging_type, $company_id, $distributor_id, $quantity, $maxDiscount, $distributors = [];
 // dynamic fields
    public $number_of_boxes, $items_per_box, $total_items, $purchase_price_box, $purchase_price_each, $sale_price_box, $sale_price_each ,$tablets_per_blister, $purchase_price_blister, $sale_price_blister;
    

    public function render()
    {
        $companies = Company::all();
        // $distributors = Distributor::all();
        $stocktypes = Type::all();
        // dd($this->types, $this->companies, $this->distributors);
        return view('livewire.stock.new-stock', [
            // 'distributors' => $distributors,
            'companies' => $companies,
            'types' => $stocktypes,
        ])->layout('layouts.index');
    }
    public function select_company(){
      //  $company = Company::find($this->company_id);
        $this->distributors = Distributor::where('company_id',  $this->company_id)->get();
      //  dd("$this->company_id");
    }

    public function updatePackagingSection()
    {
        // Reset values if a different type is selected
        $this->resetDynamicFields();
    }

    public function updateDynamicFields()
    {
        $this->resetDynamicFields();
    }

    private function resetDynamicFields()
    {
        $this->number_of_boxes = null;
        $this->items_per_box = null;
        $this->total_items = null;
        $this->purchase_price_box = null;
        $this->purchase_price_each = null;
        $this->sale_price_box = null;
        $this->sale_price_each = null;
        $this->tablets_per_blister = null;
        $this->purchase_price_blister = null;
        $this->sale_price_blister = null;
    }

    public function calculateTotal()
    {
        $this->total_items = $this->number_of_boxes * $this->items_per_box;
        $this->purchase_price_each = $this->purchase_price_box / $this->items_per_box;
        $this->sale_price_each = $this->sale_price_box / $this->items_per_box;
    }
    public function calculateTotalBlisters()
    {
        $this->total_items= $this->number_of_boxes * $this->items_per_box *  $this->tablets_per_blister;
        $this->purchase_price_blister = $this->purchase_price_box / $this->items_per_box;
        $this->purchase_price_each = $this->purchase_price_blister / $this->tablets_per_blister;
        $this->sale_price_blister = $this->sale_price_box / $this->items_per_box;
        $this->sale_price_each = $this->sale_price_blister / $this->tablets_per_blister;
    }

    public function createStock()
    {
        $this->validate([
            'medicinelogo' => 'nullable|image|max:1024',
            'barcode' => 'required',
            'medicineName' => 'required',
            'type' => 'required',
            'packaging_type' => 'required',
            'distributor_id' => 'required',
            'company_id' => 'required',
            'quantity' => 'required',
            'maxDiscount' => 'required',
            'number_of_boxes' => 'nullable', 
            'items_per_box' => 'nullable', 
            'total_items' => 'nullable', 
            'purchase_price_box' => 'nullable', 
            'purchase_price_each' => 'nullable', 
            'sale_price_box' => 'nullable', 
            'sale_price_each' => 'nullable',
            'tablets_per_blister' => 'nullable',
            'purchase_price_blister' => 'nullable',
            'sale_price_blister' => 'nullable',
        ]);

        if ($this->medicinelogo) {
            $medicinelogoPath = time() . '.' . $this->medicinelogo->getClientOriginalExtension();
            $this->medicinelogo->storeAs('medicinelogos', $medicinelogoPath, 'public');
        } else {
            $medicinelogoPath = null;
        }
        
        Stock::create([
            'medicinelogo' => $medicinelogoPath,
            'barcode' => $this->barcode,
            'medicineName' => $this->medicineName,
            'type' => $this->type,
            'packaging_type' => $this->packaging_type,
            'distributor_id' => $this->distributor_id,
            'company_id' => $this->company_id,
            'quantity' => $this->quantity,
            'maxDiscount' => $this->maxDiscount,
            'number_of_boxes' => $this->number_of_boxes,
            'items_per_box' => $this->items_per_box,
            'total_items' => $this->total_items,
            'purchase_price_box' => $this->purchase_price_box,
            'purchase_price_each' => $this->purchase_price_each,
            'sale_price_box' => $this->sale_price_box,
            'sale_price_each' => $this->sale_price_each,
            'tablets_per_blister' => $this->tablets_per_blister,
            'purchase_price_blister' => $this->purchase_price_blister,
            'sale_price_blister' => $this->sale_price_blister,
            ]);

    
        $this->reset();
    
        // Notify user of success
        session()->flash('message', 'Stock created successfully.');
    }
}
    