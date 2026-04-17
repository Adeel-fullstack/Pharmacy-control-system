<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        return view('livewire.profile.faq')->layout('layouts.index');
    }
}
