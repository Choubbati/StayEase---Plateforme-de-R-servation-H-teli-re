<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chambre;
use App\Models\Categorie;
use App\Models\Hotel;

class ChambresSeeder extends Seeder
{
    public function run(): void
    {
        $hotel = Hotel::first();

        $standard = Categorie::where('nom', 'Standard')->first();
        $suite    = Categorie::where('nom', 'Suite')->first();

        $chambresStandard = Chambre::factory()->count(3)->create([
            'hotel_id' => $hotel->id,
            'category_id' => $standard->id,
            'price_per_night' => 150,
        ]);

        $chambresSuite = Chambre::factory()->count(2)->create([
            'hotel_id' => $hotel->id,
            'category_id' => $suite->id,
            'price_per_night' => 300,
        ]);

        foreach ($chambresStandard->merge($chambresSuite) as $chambre) {
            $chambre->tags()->attach([1, 2]);
            $chambre->properties()->attach([1, 3]);
        }
    }
}
