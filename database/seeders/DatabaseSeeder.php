<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::create([
            'name' => 'Owner',
            'email' => 'owner@example.com',
            // 'role' => 'owner',
            'type' => 2,
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Cashier',
            'email' => 'cashier@example.com',
            // 'role' => 'cashier',
            'type' => 0,
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            // 'role' => 'manager',
            'type' => 1,
            'password' => Hash::make('password')
        ]);
    }
}
