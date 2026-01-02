<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peserta>
 */
class PesertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'nomor_telepon' => fake()->phoneNumber(),
            'email' => fake()->unique()->email(),
            'jenis_kelamin' => fake()->numberBetween(1, 2),
            'umur' => fake()->numberBetween(15, 52)
        ];
    }
}
