<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class Allemployee extends Component
{
    public $search; // Bind the search input
    public $employees;
    public function render()
    {
        return view('livewire.employees.allemployee')->layout('layouts.index');
    }
    public function mount(){        // Filter stocks based on the search input in real time
        $this->employees = Employee::all();
    }

    public function searches(){
        $this->employees = Employee::where('name', 'like', '%' . $this->search . '%')->get();
    }

}