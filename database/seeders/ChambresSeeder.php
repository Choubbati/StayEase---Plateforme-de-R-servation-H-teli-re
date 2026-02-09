<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chambre;

class ChambresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chambre = chambre::create([
        'hotel_id' => 1,
        'number' => '101',
        'price_per_night' => 150.00,
        'capacity' => 2,
        'description' => 'Chambre standard confortable',
        ]);
$chambre->tags()->attach([1, 2]);
$chambre->properties()->attach([1, 3]);
    }
}
