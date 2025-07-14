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
                'name' => 'Rina Putri',
                'email' => 'rina@gmail.com',
                'phone' => '082345678901',
                'address' => 'Jl. Sudirman No. 123, Payakumbuh'
            ],
            [
                'name' => 'Ahmad Fadli',
                'email' => 'ahmad@gmail.com',
                'phone' => '081234567890',
                'address' => 'Jl. Soekarno No. 45, Bukittinggi'
            ],
            [
                'name' => 'Siti Rahma',
                'email' => 'siti@gmail.com',
                'phone' => '083456789012',
                'address' => 'Jl. Diponegoro No. 67, Padang'
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'phone' => '085678901234',
                'address' => 'Jl. Veteran No. 89, Lima Puluh Kota'
            ],
            [
                'name' => 'Maya Sari',
                'email' => 'maya@gmail.com',
                'phone' => '087890123456',
                'address' => 'Jl. Pahlawan No. 34, Payakumbuh'
            ]
        ];

        foreach ($tourists as $tourist) {
            DesvitaTourist::create($tourist);
        }
    }
} 