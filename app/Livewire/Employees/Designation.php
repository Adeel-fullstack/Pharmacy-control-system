<?php

namespace App\Livewire\Employees;

use App\Models\Department;
use App\Models\Departmint;
use App\Models\Designation as ModelsDesignation;
use Livewire\Component;


class Designation extends Component
{
    public $department_id, $designation_id, $responsibilities, $designationId;
    public $updateMode = false;

    public function render()
    {
        $departments = Department::all();
        $designations = ModelsDesignation::orderBy('created_at', 'desc')->get();

        return view('livewire.employees.designation', [
            'designations' => $designations,
            'departments' => $departments,
        ])->layout('layouts.index');
    }

    public function store()
    {
        $this->validate([
            'department_id' => 'required',
            'designation_id' => 'required',
            'responsibilities' => 'required',
        ]);

        
        // Create a new designation
        ModelsDesignation::create([
            'department_id' => $this->department_id,
            'designation_id' => $this->designation_id,
            'responsibilities' => $this->responsibilities,
        ]);

        session()->flash('message', 'Designation Created Successfully.');

        // Reset input fields after storing
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->department_id = '';
        $this->designation_id = '';
        $this->responsibilities = '';
        $this->designationId = null;
        $this->updateMode = false;
    }

    public function edit($id)
    {
        // Find designation by ID
        $designation = ModelsDesignation::findOrFail($id);
        $this->designationId = $id;
        $this->department_id = $designation->department_id;
        $this->designation_id = $designation->designation_id;
        $this->responsibilities = $designation->responsibilities;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'department_id' => 'required',
            'designation_id' => 'required',
            'responsibilities' => 'required',
        ]);

        if ($this->designationId) {
            // Find and update designation
            $designation = ModelsDesignation::find($this->designationId);
            $designation->update([
                'department_id' => $this->department_id,
                'designation_id' => $this->designation_id,
                'responsibilities' => $this->responsibilities,
            ]);

            session()->flash('message', 'Designation Updated Successfully.');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        // Find and delete designation
        ModelsDesignation::find($id)->delete();
        session()->flash('message', 'Designation Deleted Successfully.');
    }
}

