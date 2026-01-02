<?php

namespace Database\Factories;

use App\Models\Peserta;
use App\Models\Event;
use App\Models\RunningEvent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftaran>
 */
class PendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $run = RunningEvent::inRandomOrder()->first(); 
        $bib = collect(explode(' ', $run->nama_event))
            ->map(fn ($word) => strtoupper($word[0]))
            ->filter(fn ($c) => ctype_alpha($c))
            ->implode('');

        return [
            'peserta_id' => Peserta::factory(),
            'event_id' => $run->id,
            'bib' => $bib,
            'kategori' => fake()->randomElement(['5KM', '10KM']),
        ];
    }
}
