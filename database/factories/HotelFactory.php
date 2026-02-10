<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'nom' => fake()->text(10),
            'description' => fake()->paragraph(2),
            'ville' => fake()->text(5),
            'image' => fake()->text(7),
            'user_id' => 7,
        ];
    }
}
