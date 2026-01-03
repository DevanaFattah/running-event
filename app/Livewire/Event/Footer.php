<?php

namespace App\Livewire\Event;

use Livewire\Component;

class Footer extends Component
{
    
    public $socials = [
        ['name' => 'instagram.com/stu.playon', 'icon' => 'instagram'],
        ['name' => 'tiktok.com/stu.playon', 'icon' => 'tiktok'],
        ['name' => 'youtube.com/stu.playon', 'icon' => 'youtube'],
        ['name' => 'facebook.com/stu.playon', 'icon' => 'facebook'],
        ['name' => 'x.com/stu.playon', 'icon' => 'x-twitter'],
    ];
    public $contacts = [
        ['val' => 'contact@stu.playon', 'icon' => 'envelope'],
        ['val' => '021-777777777', 'icon' => 'phone'],
        ['val' => 'wa.me/08888888888', 'icon' => 'whatsapp'],
    ];

    public function render()
    {
        return view('livewire.event.footer');
    }
}
