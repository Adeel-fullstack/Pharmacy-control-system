<?php

namespace App\Livewire\Sales;

use Livewire\Component;
use App\Models\salebilling;
use App\Models\Customer;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SaleHistory extends Component
{
    public $dailySales;
    public $weeklySales;
    public $monthlySales;
    public $yearlySales;
    public $totalSales;
    public $customerCount;

    public function mount()
    {
        // DAILY SALES (Today)
        $this->dailySales = salebilling::whereDate('created_at', Carbon::today())
            ->sum('total_price');

        // WEEKLY SALES (Current Week)
        $this->weeklySales = salebilling::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->sum('total_price');

        // MONTHLY SALES (Current Month)
        $this->monthlySales = salebilling::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_price');

        // YEARLY SALES (Current Year)
        $this->yearlySales = salebilling::whereYear('created_at', Carbon::now()->year)
            ->sum('total_price');

        // TOTAL SALES (All Time)
        $this->totalSales = salebilling::sum('total_price');

                 $this->customerCount = Customer::count();

    }

    public function render()
    {
        return view('livewire.sales.sale-history')
            ->layout('layouts.index');
    }
}
