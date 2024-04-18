<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'John Doe S',
            'email' => 'hrd.alphawave@demo.com',
            'password' => bcrypt('123456'),
            'company_id' => 1,
            'role' => 'HRD',
            'department' => 'IT',
            'photo' => null,
            'status' => 'Active',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'user1.alphawave@demo.com',
            'password' => bcrypt('123456'),
            'company_id' => 1,
            'role' => 'employee',
            'department' => 'IT',
            'photo' => null,
            'status' => 'Active',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'user2.alphawave@demo.com',
            'password' => bcrypt('123456'),
            'company_id' => 1,
            'role' => 'employee',
            'department' => 'IT',
            'photo' => null,
            'status' => 'Active',
        ]);

        Company::create([
            'company_name' => 'AlphaWave Inc.',
            'description' => "Leading technology sollution provider",
            'photo' => null,
            'address' => '123 main street',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'working_hour_start' => '08:00',
            'working_hour_end' => '17:00',
            'status' => 'Active',
        ]);

        Company::create([
            'company_name' => 'Innovatehub Ltd.',
            'description' => 'Driving innovation in various industries',
            'photo' => null,
            'address' => '456 elm street',
            'latitude' => 34.0522,
            'longitude' => -118.2437,
            'working_hour_start' => '09:00',
            'working_hour_end' => '18:00',
            'status' => 'Active',
        ]);
    }
}
