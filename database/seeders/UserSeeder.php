<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ✅ Create 5 random users
        User::factory(5)->create();

        // ✅ Create an admin user (optional)
        User::factory()->create([
            'Firstname' => 'Admin',
            'Lastname' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'), // or Hash::make('admin123')
            'role_id' => 1, // assuming role_id 1 = admin
        ]);

        // ✅ Create a normal user
        User::factory()->create([
            'Firstname' => 'John',
            'Lastname' => 'Doe',
            'email' => 'user@example.com',
            'password' => bcrypt('user123'),
            'role_id' => 2, // assuming role_id 2 = regular user
        ]);
    }
}
