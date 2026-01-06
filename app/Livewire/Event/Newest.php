<?php

namespace App\Livewire\Event;

use Livewire\Component;

class Newest extends Component
{
    public $events = [
        'title' => 'TAHUN BARU(A)N',
        'date' => '13 DESEMBER 2026',
        'start' => '06:00 WIB',
        'flag_off' => '07:00 WIB',
        'distance' => '5 KM',
        'elevation' => '70 M',
        'location_name' => 'WeatherTech Raceway',
        'location_sub' => 'Laguna Seca'
    ];


    public function render()
    {
        return view('livewire.event.newest');
    }
}
