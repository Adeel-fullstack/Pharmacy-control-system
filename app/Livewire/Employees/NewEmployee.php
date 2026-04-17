<?php

namespace App\Livewire\Employees;

use App\Events\EmployeeRegister;
use App\Livewire\Employees\Designation as EmployeesDesignation;
use Livewire\Component;
use App\Models\designation;
use App\Models\Department;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;

class NewEmployee extends Component
{
   use WithfileUploads;
    // standard form
    public $picture, $name, $contact, $altContact, $email, $department_id, $designation_id, $branch, $salary, $hireDate, $designations = [];
    
    public function render()
    {
        $departments = Department::all();
        // $desginations = designation::all();
        // dd($this->departments, $this->designations);
        return view('livewire.employees.new-employee', [
            'departments' => $departments,
            // 'designations'=> $designations,
        ])->layout('layouts.index');
    }
    public function select_department(){
      //  $department = Departmint::find($this->department_id);
        $this->designations = Designation::where('department_id',  $this->department_id)->get();
      //  dd("$this->department_id");
    }

    public function createEmployee()
    {
        // dd($this->name);
         $this->validate([
            'picture' => 'nullable|image|max:1024',
            'name' => 'required',
            'contact' => 'required',
            'altContact' => 'required',
            'email' => 'required|email',
            'department_id' => 'required',
            'designation_id' => 'required',
            'branch' => 'required',
            'salary' => 'required',
            'hireDate' => 'required', 
        ]);

        // dd($this->name);

        if ($this->picture) {
            $picturepath = time() . '.' . $this->picture->getClientOriginalExtension();
            $this->picture->storeAs('picturelogos', $picturepath, 'public');
        } else {
            $picturepath = null;
        }
        
  $employee= Employee::create([
            'picture' => $picturepath,
            'name' => $this->name,
            'contact' => $this->contact,
            'altContact' => $this->altContact,
            'email' => $this->email,
            'department_id' => $this->department_id,
            'designation_id' => $this->designation_id,
            'branch' => $this->branch,
            'salary' => $this->salary,
            'hireDate' => $this->hireDate,
            ]);
    
        $this->reset();

        event(new EmployeeRegister($employee));
    
        // Notify user of success
        session()->flash('message', 'Employee created successfully.');
    }
}
    