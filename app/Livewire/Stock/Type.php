<?php
namespace App\Livewire\Stock;

use App\Models\Type as TypeModel;
use Livewire\Component;

class Type extends Component
{
    public $type; 
    public $types = [];
    public $editMode = false;
    public $editId;

    public function mount()
    {
        $this->fetchTypes();
    }

    public function fetchTypes()
    {
        $this->types = TypeModel::all();
    }

    public function saveType()
    {
        $this->validate([
            'type' => 'required|string|max:255',
        ]);

        if ($this->editMode) {
            $type = TypeModel::findOrFail($this->editId); 
            $type->update(['type' => $this->type]);
            $this->editMode = false;

            session()->flash('message', 'Type updated successfully!');
        } else {
            TypeModel::create(['type' => $this->type]);
            session()->flash('message', 'Type created successfully!');
        }

        $this->reset(['type', 'editId']);
        $this->fetchTypes(); 
    }

    public function editType($id)
    {
        $type = TypeModel::findOrFail($id);
        $this->type = $type->type;
        $this->editId = $type->id;
        $this->editMode = true;
    }

    public function deleteType($id)
    {
        TypeModel::destroy($id);
        $this->fetchTypes();
        session()->flash('message', 'Type deleted successfully!');
    }

    public function render()
    {
        return view('livewire.stock.type')->layout('layouts.index');
    }
}
