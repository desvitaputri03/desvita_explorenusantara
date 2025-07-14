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
        $destinations = DesvitaDestination::all();
        $tourists = DesvitaTourist::all();

        if ($destinations->count() > 0 && $tourists->count() > 0) {
            $bookings = [
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'booking_date' => now()->addDays(rand(1, 30)),
                    'status' => 'confirmed'
                ],
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'booking_date' => now()->addDays(rand(1, 30)),
                    'status' => 'pending'
                ],
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'booking_date' => now()->addDays(rand(1, 30)),
                    'status' => 'completed'
                ],
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'booking_date' => now()->addDays(rand(1, 30)),
                    'status' => 'confirmed'
                ],
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'booking_date' => now()->addDays(rand(1, 30)),
                    'status' => 'pending'
                ]
            ];

            foreach ($bookings as $booking) {
                DesvitaBooking::create($booking);
            }
        }
    }
} 