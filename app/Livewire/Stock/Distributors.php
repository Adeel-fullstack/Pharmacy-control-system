<?php

namespace App\Livewire\Stock;

use App\Events\DistributorRegister;
use App\Models\Distributor;
use App\Models\Company;
use Livewire\Component;

class Distributors extends Component
{
    public $company_id, $distributor_name, $distributor,$distributor_email, $contact_person, $phone, $address, $distributorId;
    public $updateMode = false;

    public function render()
    {
        // Fetch all companies for the dropdown
        $companies = Company::all();

        // Fetch all distributors
        $distributors = Distributor::orderBy('created_at', 'desc')->get();
        
        // Return the view with distributors and companies
        return view('livewire.stock.distributors', [
            'distributors' => $distributors,
            'companies' => $companies,
        ])->layout('layouts.index');
    }

    public function store()
    {
        $this->validate([
            'company_id' => 'required',
            'distributor_name' => 'required',
            'distributor_email' => 'required|email',
            'contact_person' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Create a new distributor
       $distributor= Distributor::create([
            'company_id' => $this->company_id,
            'distributor_name' => $this->distributor_name,
            'distributor_email'=>$this->distributor_email,
            'contact_person' => $this->contact_person,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);
       



        session()->flash('message', 'Distributor Created Successfully.');

        // Reset input fields after storing
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->company_id = '';
        $this->distributor_name = '';
        $this->distributor_email='';
        $this->contact_person = '';
        $this->phone = '';
        $this->address = '';
        $this->distributorId = null;
        $this->updateMode = false;
    }

    public function edit($id)
    {
        // Find distributor by ID
        $distributor = Distributor::findOrFail($id);
        $this->distributorId = $id;
        $this->company_id = $distributor->company_id;
        $this->distributor_name = $distributor->distributor_name;
        $this->distributor_email= $distributor->distributor_email;
        $this->contact_person = $distributor->contact_person;
        $this->phone = $distributor->phone;
        $this->address = $distributor->address;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'company_id' => 'required',
            'distributor_name' => 'required',
            'distributor_email'=>'required|email',
            'contact_person' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($this->distributorId) {
            // Find and update distributor
            $distributor = Distributor::find($this->distributorId);
            $distributor->update([
                'company_id' => $this->company_id,
                'distributor_name' => $this->distributor_name,
                'distributor_email'=>$this->distributor_email,
                'contact_person' => $this->contact_person,
                'phone' => $this->phone,
                'address' => $this->address,
            ]);

            session()->flash('message', 'Distributor Updated Successfully.');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        // Find and delete distributor
        Distributor::find($id)->delete();
        session()->flash('message', 'Distributor Deleted Successfully.');
    }
}
