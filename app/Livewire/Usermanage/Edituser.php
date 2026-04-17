<?php

namespace App\Livewire\Usermanage;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Edituser extends Component
{
    use WithFileUploads;

    public $user; 
    public $name, $email, $phone, $role_id, $description, $password, $password_confirmation, $picture;
    public $roles;
    public $userpicture;
    // public $imagepath;

    // Mount function to load user data based on the user ID passed
    public function mount(User $user)
    {
        $this->user = $user; // Bind user to the component

        // Pre-fill the form fields with user data
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role_id = $user->role_id;
        $this->description = $user->description;
        $this->userpicture = $user->picture;

        // Fetch roles for dropdown
        $this->roles = \App\Models\Role::all(); 
        
        // Assuming you have a Role model
     // Ensure Role model is correctly set up

    }

    // Update function to save changes
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'phone' => 'nullable|string|max:255',
            'role_id' => 'required|exists:roles,id',
            'description' => 'nullable|string',
            'password' => 'nullable|confirmed|string|min:6',
            'picture' => 'nullable|image|max:1024',
        ]);

        // Handle picture upload
        if ($this->picture) {
            $imagepath = $this->picture->store('userspicture', 'public');
        } else {
            $imagepath = $this->user->picture; // Keep the old picture if no new one is uploaded

            dd('No new picture uploaded, using existing picture: ' . $imagepath);

        }

        // Update user data
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role_id' => $this->role_id,
            'description' => $this->description,
            'password' => $this->password ? Hash::make($this->password) : $this->user->password, // Only update password if provided
            'picture' => $imagepath,
        ]);

        session()->flash('message', 'User updated successfully.');

        return redirect()->route('userman.manageusers'); // Redirect to the manage users page
    }

    public function render()
    {
        return  view('livewire.usermanage.edituser')->layout('layouts.index');
    }
}
