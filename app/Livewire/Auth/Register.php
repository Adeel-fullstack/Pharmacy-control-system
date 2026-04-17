<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
        public $name;
        public $email;
        public $password;
        public $password_confirmation;
    
        public function register(){
            $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            ]);
    
           $user=User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);



            return redirect()->route('login');
        }
    
        
    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.app');
    }
}