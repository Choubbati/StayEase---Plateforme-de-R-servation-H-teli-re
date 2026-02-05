<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(ChambresSeeder::class);
        // to call one or more of seeders in the same time
        $this->call(
            HotelSeeder::class,
        );
//        DB::table('hotels')->insert([
//            'nom' => Str::random(10),
//            'description' =>Str::random(20),
//            'ville' => Str::random(10),
//            'image' => Str::random(10),
//        ]);
        //Hotel::factory(10)->create();
    }
}
