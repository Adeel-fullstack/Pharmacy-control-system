<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Customer; 
use App\Models\salebilling;
use App\Models\stock;
use App\Models\Sale;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;
 

use Illuminate\Support\Facades\DB; 

class Dashboard extends Component
{


     public $customerCount;    
    public $totalSales;
    public $search = ''; 
    public $stocks = [];
    public $stocklevel;

    public function mount()
    {
         $this->customerCount = Customer::count();
        // Fetch the total sales for the current day (or any other condition)
 
        $this->totalSales = salebilling::whereDate('created_at', today())
        ->sum('total_price');


        $this->stocklevel=Stock::count();

         $this->fetchStocks();

    }

    // You can also listen for updates and re-render the component when new sales are added
    protected $listeners = ['saleAdded' => 'updateTotalSales'];

    public function updateTotalSales()
    {
        // Recalculate the total sales after a new sale is added
            $this->totalSales = salebilling::sum(DB::raw('price * quantity'));

    }



    public function fetchStocks()
    {
        $this->stocks = Stock::with(['distributor', 'company'])
            ->when($this->search, function ($query) {
                $query->where('medicineName', 'like', '%' . $this->search . '%');
            })
            ->latest('created_at') // Order by latest created products
            ->take(5) // Limit to the latest 5
            ->get();

    }


     public function updatedSearch()
    {
        $this->fetchStocks();
    }

    public $sales = []; // Public property for sales
     public  $customers = [];



public function exportStocks()
{
    return Excel::download(new StockExport, 'stock-list.xlsx');
}



    public function render()
    {
        // Retrieve the latest 5 sales, filtered by search term
        $this->sales = Sale::with(['customer'])
            ->when($this->search, function ($query) {
                $query->where('medicineName', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->take(5)
            ->get();


             $this->customers = Customer::latest()->take(5)->get();


     return view('livewire.dashboard')->layout('layouts.index');
}

}


