<?php

namespace App\Livewire\Event;

use Livewire\Component;

class NewestEvent extends Component
{
    public $event;

    public function mount($event)
    {
        // Ambil data pertama dari $event yang dipass dari index.blade.php
        $this->event = $event;  
    }

    public function render()
    {
        return view('livewire.event.newest-event');
    }
}
