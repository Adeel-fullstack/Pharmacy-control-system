<?php

namespace App\Livewire\Stock;

use App\Models\Stock;
use Livewire\Component;
use PDF;

class StockRequired extends Component
{
    public $stocks;

    public function mount()
    {
        // Load stocks with less than 10 items
        $this->stocks = Stock::where('total_items', '<', 10)->get();
    }

    public function downloadPdf()
    {
        $stocks = Stock::where('total_items', '<', 10)->get();
        
        $pdf = PDF::loadView('livewire.stock.stock-required-pdf', compact('stocks'));
        
        return response()->streamDownload(
            fn() => print($pdf->output()),
            'Stock_Required.pdf'
        );
    }

    public function render()
    {
        return view('livewire.stock.stock-required')->layout('layouts.index');
    }
}
