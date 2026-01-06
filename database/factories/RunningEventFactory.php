<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RunningEvent>
 */
class RunningEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $time = Carbon::createFromFormat('H:i:s', fake()->time());

        return [
            'nama_event' => fake()->sentence(3),
            'tanggal' => fake()->date(),
            'lokasi' => fake()->streetAddress() . ', ' . fake()->city(),
            'subLokasi' => fake()->city(),
            'kuota' => fake()->numberBetween(100, 1000),
            'start' => $time,
            'flag_off' => $time->modify('+1 hour')->format('H:i'),
            'deskripsi' => fake()->paragraph(),
        ];
    }
}
