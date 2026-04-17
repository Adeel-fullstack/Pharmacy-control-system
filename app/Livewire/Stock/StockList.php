<?php

namespace App\Livewire\Stock;

use App\Models\Stock;
use Livewire\Component;

class StockList extends Component
{
    public $search; // Bind the search input
    public $stocks;
    public function render() {
        return view('livewire.stock.stock-list')->layout('layouts.index');
    }

    public function mount(){        // Filter stocks based on the search input in real time
        $this->stocks = Stock::all();
    }

    public function searches(){
        $this->stocks = Stock::where('medicineName', 'like', '%' . $this->search . '%')->get();
    }

}
 