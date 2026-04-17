<?php

namespace App\Livewire\Shortcuts;

use Livewire\Component;

class Calendar extends Component
{
    public function render()
    {
        return view('livewire.shortcuts.calendar')->layout('layouts.index');
    }
}
