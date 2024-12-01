<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@test.com',
        ]);

        \App\Models\Company::factory()->count(10)->create();
        ([
            'name' => 'Test Company',
            'phone_number' => '+31638338498',
            'street' => 'TestStreet',
            'house_number' => '82',
            'city' => 'New York',
        ]);
    }
}
