<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'nama_event' => fake()->sentence(3),
            'kuota' => fake()->numberBetween(100, 1000),
            'tanggal' => fake()->date(),
            'lokasi' => fake()->city(),
            'deskripsi' => fake()->paragraph(),
        ];
    }
}
