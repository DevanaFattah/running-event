<?php

namespace Database\Seeders;

use App\Models\Pendaftaran;
use App\Models\User;
use App\Models\event;
use App\Models\RunningEvent;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Symfony\Contracts\EventDispatcher\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        // Event::factory(30)->create
        $shaRun = RunningEvent::factory(2)->create(['nama_event' => "SHA FUN RUN" ]);
        $malioboroRun = RunningEvent::factory(2)->create(['nama_event' => "MALIOBORO NIGHT RUN" ]);

        // Pendaftaran::factory(30)->create();
        // Pendaftaran::factory(20)->create(['event_id' => $shaRun->first()->id]);
        // Pendaftaran::factory(20)->create(['event_id' => $malioboroRun->first()->id]);

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );
    }
}
