<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DesvitaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Desvita Admin',
            'email' => 'desvitaputri65@gmail.com',
            'password' => Hash::make('Vita1112'),
            'role' => 'admin',
        ]);

        // Create Regular User
        User::create([
            'name' => 'Desvita User',
            'email' => 'user@desvita.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
