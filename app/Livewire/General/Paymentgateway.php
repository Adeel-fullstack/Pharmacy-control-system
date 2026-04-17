<?php

namespace App\Livewire\General;

use App\Models\Paygate;
use Livewire\Component;

class Paymentgateway extends Component
{
    public $title; 
    public $titles = [];
    public $editMode = false;
    public $editId;

    public function mount()
    {
        $this->fetchTitle();
    }

    public function fetchTitle()
    {
        $this->titles = Paygate::all();
    }

    public function saveTitle()
    {
        $this->validate([
            'title' => 'required|string|max:255',
        ]);

        if ($this->editMode) {
            $title = Paygate::findOrFail($this->editId); 
            $title->update(['title' => $this->title]);
            $this->editMode = false;

            session()->flash('message', 'Title updated successfully!');
        } else {
            Paygate::create(['title' => $this->title]);
            session()->flash('message', 'Title created successfully!');
        }

        $this->reset(['title', 'editId']);
        $this->fetchTitle(); 
    }

    public function editTitle($id)
    {
        $title = Paygate::findOrFail($id);
        $this->title = $title->title;
        $this->editId = $title->id;
        $this->editMode = true;
    }

    public function deleteTitle($id)
    {
        Paygate::destroy($id);
        $this->fetchTitle();
        session()->flash('message', 'Title deleted successfully!');
    }
    public function render()
    {
        return view('livewire.general.paymentgateway')->layout('layouts.index');
    }
}
