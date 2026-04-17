<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
        public $email;
        public $password;
    
        public function login()
        {
            $credentials = $this->validate([
                'email' => 'required|string',
                'password' => 'required',
            ]);
    
            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard');
            }
    
            $this->addError('email', 'Invalid credentials.');
        }
    
    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
};
