<?php

namespace App\Livewire\Stock;

use App\Models\Suggestion;
use Livewire\Component;

use function Laravel\Prompts\suggest;

class Suggestions extends Component
{
    public $suggestions, $medicineName, $companyName, $distributorName, $suggestionId;

    public function render()
    {
        $this->suggestions = Suggestion::all();
        return view('livewire.stock.suggestions')->layout('layouts.index');
    }

    public function resetInputFields()
    {
        $this->medicineName = '';
        $this->companyName = '';
        $this->distributorName= '';
    }

    public function store()
    {
        $this->validate([
            'medicineName' => 'required',
            'companyName' => 'required',
            'distributorName' => 'nullable',
        ]);

        Suggestion::create([
            'medicineName' => $this->medicineName,
            'companyName' => $this->companyName,
            'distributorName' => $this->distributorName,
        ]);

        session()->flash('message', 'Suggestion Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $suggestion = Suggestion::findOrFail($id);
        $this->suggestionId = $id;
        $this->medicineName = $suggestion->medicineName;
        $this->companyName = $suggestion->companyName;
        $this->distributorName = $suggestion->distributorName;
    }

    public function update()
    {
        $this->validate([
            'medicineName' => 'required',
            'companyName' => 'required',
            'distributorName' => 'nullable',
        ]);

        $suggestion = Suggestion::findOrFail($this->suggestionId);

        $suggestion->update([
            'medicineName' => $this->medicineName,
            'companyName' => $this->companyName,
            'distributorName' => $this->distributorName,
        ]);

        session()->flash('message', 'Suggestion Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->delete();

        session()->flash('message', 'Suggestion Deleted Successfully.');
    }
}





















