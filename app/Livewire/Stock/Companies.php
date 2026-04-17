<?php

namespace App\Livewire\Stock;

use Livewire\Component;
use App\Models\Company;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Companies extends Component
{
    use WithFileUploads;

    public $companies, $logo, $name, $phone, $description, $website, $companyId;

    public function render()
    {
        $this->companies = Company::all();
        return view('livewire.stock.companies')->layout('layouts.index');
    }

    public function resetInputFields()
    {
        $this->logo = '';
        $this->name = '';
        $this->phone = '';
        $this->description = '';
        $this->website = '';
        $this->companyId = ''; 
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'description' => 'nullable',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|max:1024',
        ]);

        if ($this->logo) {
            $logoPath = time() . '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('logos', $logoPath, 'public');
        } else {
            $logoPath = null;
        }

        Company::create([
            'logo' => $logoPath,
            'name' => $this->name,
            'phone' => $this->phone,
            'description' => $this->description, 
            'website' => $this->website,
        ]);

        session()->flash('message', 'Company Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $this->companyId = $id;
        $this->logo = $company->logo;
        $this->name = $company->name;
        $this->phone = $company->phone;
        $this->description = $company->description;
        $this->website = $company->website;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'description' => 'nullable',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|max:1024',
        ]);

        $company = Company::findOrFail($this->companyId);


        if ($this->logo instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $logoPath = time() . '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('logos', $logoPath, 'public');
        } else {
            $logoPath = $company->logo;
        }

        $company->update([
            'logo' => $logoPath,
            'name' => $this->name,
            'phone' => $this->phone,
            'description' => $this->description,
            'website' => $this->website,
        ]);

        session()->flash('message', 'Company Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();

        session()->flash('message', 'Company Deleted Successfully.');
    }
}
