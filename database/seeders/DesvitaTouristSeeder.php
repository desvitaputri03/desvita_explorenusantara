<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DesvitaTourist;

class DesvitaTouristSeeder extends Seeder
{
    public function run(): void
    {
        $tourists = [
            [
                'name' => 'Ahmad Rizki',
                'email' => 'ahmad.rizki@email.com',
                'phone' => '081234567890'
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@email.com',
                'phone' => '081234567891'
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@email.com',
                'phone' => '081234567892'
            ],
            [
                'name' => 'Dewi Sartika',
                'email' => 'dewi.sartika@email.com',
                'phone' => '081234567893'
            ],
            [
                'name' => 'Joko Widodo',
                'email' => 'joko.widodo@email.com',
                'phone' => '081234567894'
            ]
        ];

        foreach ($tourists as $tourist) {
            DesvitaTourist::create($tourist);
        }
    }
} 