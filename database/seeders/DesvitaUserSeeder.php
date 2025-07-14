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
        User::create([
            'name' => 'Admin Desvita',
            'email' => 'desvitaputri65@gmail.com',
            'password' => Hash::make('desvita123'),
            'role' => 'admin',
        ]);
    }
}
