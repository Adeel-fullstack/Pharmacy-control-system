<?php

namespace App\Livewire\Usermanage;
use App\Events\UserRegister;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddUser extends Component
{
    use WithFileUploads; // Add this line to enable file uploads

    public $name, $email, $phone, $role_id, $user ,$description, $password, $password_confirmation, $picture , $imagePath;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'role_id' => 'required|exists:roles,id',
        'description' => 'nullable|string|max:500',
        'password' => 'required|min:6|same:password_confirmation',
        'password_confirmation' => 'required|min:6',
        'picture' => 'nullable|image|max:1024', // Validates that the file is an image and limits size to 1MB
    ];

    public function saveUser()
    {
        $this->validate();
          
            if ($this->picture) {
                $imagePath = time() . '.' . $this->picture->getClientOriginalExtension();
                $this->picture->storeAs('userspicture', $imagePath, 'public');
    
                
            }
             else {
                $imagePath = null;
            }

        // Save the user
       $user= User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role_id' => $this->role_id,
            'description' => $this->description,
            'password' => Hash::make($this->password),
            'picture' => $imagePath, // Save picture path if uploaded
        ]);


        event(new UserRegister($user,$this->password));

        // Clear the form fields after saving
        $this->reset();


        // Optional: Display a success message
        session()->flash('message', 'User created successfully.');
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.usermanage.add-user', ['roles' => $roles])->layout('layouts.index');
    }
}