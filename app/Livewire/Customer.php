<?php

namespace App\Livewire;

use App\Models\Customer as ModelsCustomer;
use Livewire\Component;
use App\Events\CustomerRegistered;


class Customer extends Component
{
    public $customers, $name, $whatsapp, $email, $customerId;

    public function render()
    {
        $this->customers = ModelsCustomer::all();
        return view('livewire.customer')->layout('layouts.index');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->whatsapp = '';
        $this->email = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'whatsapp' => 'required',
            'email' => 'nullable|email',
        ]);

        $customer=ModelsCustomer::create([
            'name' => $this->name,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
        ]);



        session()->flash('message', 'Customer Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $customer = ModelsCustomer::findOrFail($id);
        $this->customerId = $id;
        $this->name = $customer->name;
        $this->whatsapp = $customer->whatsapp;
        $this->email = $customer->email;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'whatsapp' => 'required',
            'email' => 'nullable|email',
        ]);

        $customer = ModelsCustomer::findOrFail($this->customerId);

        $customer->update([
            'name' => $this->name,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Customer Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $customer = ModelsCustomer::findOrFail($id);
        $customer->delete();

        session()->flash('message', 'Customer Deleted Successfully.');
    }
}
