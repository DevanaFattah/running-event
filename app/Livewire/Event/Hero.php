<?php

namespace App\Livewire\Event;

use Livewire\Component;

class Hero extends Component
{
    public $headline = 'LOREM IPSUM';
    public $subheadline = 'Lorem ipsum dolor sit amet LOREM IPSUM';

    public function render()
    {
        return view('livewire.event.hero');
    }
}
