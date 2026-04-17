<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Generale;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class General extends Component
{
    use WithFileUploads;

    public $generales, $logo, $name, $email, $whatsapp, $landline, $address, $website, $generaleId;

    public function render()
    {
        $this->generales = Generale::all();
        return view('livewire.general')->layout('layouts.index');
    }

    public function resetInputFields()
    {
        $this->logo = '';
        $this->name = '';
        $this->email = '';
        $this->whatsapp = '';
        $this->landline = '';
        $this->address = '';
        $this->website = '';
        $this->generaleId = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'nullable',
            'landline' => 'nullable',
            'address' => 'nullable',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|max:1024',
        ]);

        if ($this->logo) {
            $logoPath = time() . '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('generallogos', $logoPath, 'public');
        } else {
            $logoPath = null;
        }

        Generale::create([
            'logo' => $logoPath,
            'name' => $this->name,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'landline' => $this->landline,
            'address' => $this->address,
            'website' => $this->website,
        ]);

        session()->flash('message', 'General Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $generale = Generale::findOrFail($id);
        $this->generaleId = $id;
        $this->logo = $generale->logo;
        $this->name = $generale->name;
        $this->email = $generale->email;
        $this->whatsapp = $generale->whatsapp;
        $this->landline = $generale->landline;
        $this->address = $generale->address;
        $this->website = $generale->website;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'nullable',
            'landline' => 'nullable',
            'address' => 'nullable',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|max:1024',
        ]);

        $generale = Generale::findOrFail($this->generaleId);

        if ($this->logo instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
            if ($generale->logo) {
                Storage::disk('public')->delete($generale->logo);
            }
            $logoPath = time() . '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('generallogos', $logoPath, 'public');
        } else {
            $logoPath = $generale->logo;
        }

        $generale->update([
            'logo' => $logoPath,
            'name' => $this->name,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'landline' => $this->landline,
            'address' => $this->address,
            'website' => $this->website,
        ]);

        session()->flash('message', 'General Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $generale = Generale::findOrFail($id);
        if ($generale->logo) {
            Storage::disk('public')->delete($generale->logo);
        }
        $generale->delete();

        session()->flash('message', 'General Deleted Successfully.');
    }
}
