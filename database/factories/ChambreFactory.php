<?php

namespace Database\Factories;

use App\Models\Chambre;
use App\Models\Hotel;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChambreFactory extends Factory
{
    protected $model = Chambre::class;

    public function definition(): array
    {
        return [
            'hotel_id' => Hotel::inRandomOrder()->first()?->id ?? Hotel::factory(),
            'category_id' => Categorie::inRandomOrder()->first()?->id ?? Categorie::factory(),
            'number' => $this->faker->unique()->numberBetween(100, 999),
            'price_per_night' => $this->faker->numberBetween(100, 500),
            'capacity' => $this->faker->numberBetween(1, 4),
            'description' => $this->faker->sentence(),
        ];
    }
}
