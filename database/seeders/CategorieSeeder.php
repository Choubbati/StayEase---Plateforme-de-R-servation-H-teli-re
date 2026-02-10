<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::factory(10)->create();
        Categorie::factory()->create([
            'nom' => 'Suite',
            'quantite' => fake()->numberBetween(),
            'user_id' => 7
        ]);
        Categorie::factory()->create([
            'nom' => 'Standard',
            'quantite' => fake()->numberBetween(),
            'user_id' => 7
        ]);
    }
}
