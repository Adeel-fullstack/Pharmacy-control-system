<?php

namespace App\Livewire\Billing;

use Livewire\Component;

class Invoices extends Component
{
    public function render()
    {
        return view('livewire.billing.invoices')->layout('layouts.index');
    }
}
