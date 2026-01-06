<?php

namespace App\Livewire\Event;

use Livewire\Component;

class Listing extends Component
{
    // public $events = [
    //     [
    //         'title' => 'TAHUN BARU(A)N',
    //         'date' => '13 DES 2026',
    //         'location' => 'Laguna Seca',
    //         'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet, erat quis tristique egestas, arcu libero fringilla dui, id viverra lectus sem id diam.'
    //     ],
    //     [
    //         'title' => 'TAHUN BARU(A)N',
    //         'date' => '13 DES 2026',
    //         'location' => 'Laguna Seca',
    //         'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet, erat quis tristique egestas, arcu libero fringilla dui, id viverra lectus sem id diam.'
    //     ],
    //     [
    //         'title' => 'TAHUN BARU(A)N',
    //         'date' => '13 DES 2026',
    //         'location' => 'Laguna Seca',
    //         'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet, erat quis tristique egestas, arcu libero fringilla dui, id viverra lectus sem id diam.'
    //     ],
    // ];
    public $others;

    public function render()
    {
        return view('livewire.event.listing');
    }
}
