<?php

namespace App\Livewire\Sales;

use App\Models\Customer;
use App\Models\Sale;
use App\Models\Stock;
use Livewire\Component;

class Sales extends Component
{
    public $search;
    public $sales;
    public $customers;
    public $stocks;
    public function render()
    {
        return view('livewire.sales.sales')->layout('layouts.index');
    }
    public function mount(){
        $this->sales = Sale::all();
        $this->customers = Customer::all();
        $this->stocks= Stock::all();
    }

    public function searches()
{
    $this->sales = Sale::whereHas('customer', function ($query) {
        $query->where('name', 'like', '%' . $this->search . '%');
    })
    ->orWhereHas('stock', function ($query) {
        $query->where('medicineName', 'like', '%' . $this->search . '%');
    })
    ->with(['customer', 'stock'])
    ->get();
}
}
