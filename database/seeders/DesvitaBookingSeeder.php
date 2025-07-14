<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DesvitaBooking;
use App\Models\DesvitaDestination;
use App\Models\DesvitaTourist;

class DesvitaBookingSeeder extends Seeder
{
    public function run(): void
    {
        $bookings = [
            [
                'tourist_id' => 1,
                'destination_id' => 1, // Lembah Harau
                'booking_date' => '2024-02-15',
                'number_of_people' => 4,
                'total_price' => 100000, // 25000 x 4
                'status' => 'confirmed',
                'notes' => 'Mohon disediakan guide untuk hiking dan informasi spot foto terbaik',
                'created_at' => '2024-02-10'
            ],
            [
                'tourist_id' => 2,
                'destination_id' => 3, // Batang Tabik Adventure Park
                'booking_date' => '2024-02-20',
                'number_of_people' => 6,
                'total_price' => 210000, // 35000 x 6
                'status' => 'confirmed',
                'notes' => 'Kami ingin mencoba semua wahana, terutama flying fox dan arung jeram',
                'created_at' => '2024-02-12'
            ],
            [
                'tourist_id' => 3,
                'destination_id' => 6, // Puncak Marajo
                'booking_date' => '2024-02-25',
                'number_of_people' => 2,
                'total_price' => 60000, // 30000 x 2
                'status' => 'pending',
                'notes' => 'Reservasi tempat di kafe untuk menikmati sunset',
                'created_at' => '2024-02-13'
            ],
            [
                'tourist_id' => 4,
                'destination_id' => 5, // Air Terjun Sarasah Tanggo
                'booking_date' => '2024-03-01',
                'number_of_people' => 5,
                'total_price' => 100000, // 20000 x 5
                'status' => 'confirmed',
                'notes' => 'Tolong siapkan guide yang bisa menjelaskan rute aman ke setiap tingkat air terjun',
                'created_at' => '2024-02-14'
            ],
            [
                'tourist_id' => 5,
                'destination_id' => 4, // Bukik Bulek Taram
                'booking_date' => '2024-03-05',
                'number_of_people' => 3,
                'total_price' => 45000, // 15000 x 3
                'status' => 'pending',
                'notes' => 'Rencana camping 1 malam untuk melihat sunrise, mohon siapkan area camping yang view-nya bagus',
                'created_at' => '2024-02-15'
            ]
        ];

        foreach ($bookings as $booking) {
            DesvitaBooking::create($booking);
        }
    }
} 