<?php

namespace App\Livewire\Usermanage;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class ManageUsers extends Component
{
    public $users;
    public $showDeleteModal = false;
    public $deleteUserId;
    public $title;
    

    public function mount()
    {
        $this->users = User::all();
     $this->users = User::with('role')->get(); 

    

    }

    public function confirmDelete($id)
    {
        $this->deleteUserId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed()
    {
        if ($this->deleteUserId) {
            $user = User::find($this->deleteUserId);
            if ($user) {
                $user->delete();
                session()->flash('message', 'User deleted successfully.');
            }
        }
        $this->showDeleteModal = false;
            $this->users = User::with('role')->get(); // Load the role relationship
 
    }
    public function editUser ($id)
    {
        return redirect()->route('userman.edituser', ['user' => $id]);
    }

    public function render()
    {
        return view('livewire.usermanage.manageusers')->layout('layouts.index');
    }
}
