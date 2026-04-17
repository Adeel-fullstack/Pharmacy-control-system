<?php

namespace App\Livewire\Employees;

use App\Models\Department as  DepartmentModel;
use Livewire\Component;

class Department extends Component
{
    public $department;
    public $departments = [];
    public $editMode = false;
    public $editId;

    public function mount()
    {
        $this->fetchDepartments();
    }

    public function fetchDepartments()
    {
        $this->departments = DepartmentModel::all();
    }

    public function saveDepartment()
    {
        $this->validate([
            'department' => 'required|string|max:255',
        ]);

        if ($this->editMode) {
            $department = DepartmentModel::findOrFail($this->editId);
            $department->update(['department' => $this->department]);
            $this->editMode = false;

            session()->flash('message', 'Department updated successfully!');
        } else {
            DepartmentModel::create(['department' => $this->department]);
            session()->flash('message', 'Department created successfully!');
        }

        $this->reset(['department', 'editId']);
        $this->fetchDepartments();
    }

    public function editDepartment($id)
    {
        $department = DepartmentModel::findOrFail($id);
        $this->department = $department->department;
        $this->editId = $department->id;
        $this->editMode = true;
    }

    public function deleteDepartment($id)
    {
        DepartmentModel::destroy($id);
        $this->fetchDepartments();
        session()->flash('message', 'Department deleted successfully!');
    }

    public function render()
    {
        return view('livewire.employees.department')->layout('layouts.index');
    }
}
