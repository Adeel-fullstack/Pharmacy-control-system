<?php

namespace App\Livewire\Usermanage;

use App\Models\Role;
use Livewire\Component;

class Roles extends Component
{
    public $title, $status, $roleId, $roles;
    public $updateMode = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'status' => 'required|string|max:255',
    ];

    public function resetInputFields()
    {
        $this->title = '';
        $this->status = '';
    }

    public function store()
    {
        $this->validate();
        Role::create([
            'title' => $this->title,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Role added successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $role->id;
        $this->title = $role->title;
        $this->status = $role->status;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->roleId) {
            $role = Role::find($this->roleId);
            $role->update([
                'title' => $this->title,
                'status' => $this->status,
            ]);

            session()->flash('message', 'Role updated successfully.');
            $this->resetInputFields();
            $this->updateMode = false;
        }
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('message', 'Role deleted successfully.');
    }

    public function render()
    {
        $this->roles = Role::all();
        return view('livewire.usermanage.roles')->layout('layouts.index');
    }
}
