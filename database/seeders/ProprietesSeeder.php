<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Properties;

class ProprietesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $propietes = ['Wi-Fi', 'Climatisation','Vue sur mer', 'Piscine', 'Balcon'];
        foreach ($propietes as $propiete) {
        Properties::create([
        'nom' => $propiete,
        ]);

        } 
    }
}
