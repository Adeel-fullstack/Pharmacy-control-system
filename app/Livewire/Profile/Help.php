<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class Help extends Component
{
    public function render()
    {
        return view('livewire.profile.help')->layout('layouts.index');
    }
}
