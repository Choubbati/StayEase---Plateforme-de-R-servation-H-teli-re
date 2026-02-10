<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Hotel;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Database\Seeders\ChambresSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(TagSeeder::class);

        $this->call(ProprietesSeeder::class);

        $this->call(CategorieSeeder::class);

        $this->call(HotelSeeder::class);

        $this->call(ChambresSeeder::class);

        //$this->call(ReservationsSeeder::class);
    }
}
