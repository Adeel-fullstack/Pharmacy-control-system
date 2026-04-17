<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class MyProfile extends Component
{
    public function render()
    {
        return view('livewire.profile.my-profile')->layout('layouts.index');
    }
}
