<?php

namespace App\Livewire\Event;

use Livewire\Component;

class AboutSection extends Component
{
    public $title = 'LOREM IPSUM';
    public $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet, erat quis tristique egestas, arcu libero fringilla dui, id viverra lectus sem id diam. Fusce ut commodo est, vel feugiat ante. Suspendisse viverra elit nec lacus vestibulum vehicula.';

    public function render()
    {
        return view('livewire.event.about-section');
    }
}
