<?php

namespace Database\Factories;

use App\Models\Peserta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Peserta>
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
            'name' => fake('id_ID')->name(),
            'age' => fake('id_ID')->numberBetween(18, 60),
            'email' => fake('id_ID')->email(),
            'address' => fake('id_ID')->address(),
        ];
    }
}
