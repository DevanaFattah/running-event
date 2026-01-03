<?php

namespace App\Livewire\Event;

use Livewire\Component;

class Detail extends Component
{
    public $event;

    public function render()
    {
        return view('livewire.event.detail');
    }
}
