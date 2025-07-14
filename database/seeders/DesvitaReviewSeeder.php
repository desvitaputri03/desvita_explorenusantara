<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DesvitaReview;
use App\Models\DesvitaDestination;
use App\Models\DesvitaTourist;

class DesvitaReviewSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = DesvitaDestination::all();
        $tourists = DesvitaTourist::all();

        if ($destinations->count() > 0 && $tourists->count() > 0) {
            $reviews = [
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'rating' => 5,
                    'comment' => 'Destinasi yang sangat indah! Pemandangan alamnya luar biasa dan pelayanan sangat memuaskan.'
                ],
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'rating' => 4,
                    'comment' => 'Tempat yang bagus untuk liburan keluarga. Fasilitas cukup lengkap.'
                ],
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'rating' => 5,
                    'comment' => 'Pengalaman wisata yang tak terlupakan! Sangat direkomendasikan.'
                ],
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'rating' => 3,
                    'comment' => 'Tempatnya bagus, tapi perlu perbaikan di beberapa fasilitas.'
                ],
                [
                    'destination_id' => $destinations->random()->id,
                    'tourist_id' => $tourists->random()->id,
                    'rating' => 4,
                    'comment' => 'Suasana yang nyaman dan tenang. Cocok untuk refreshing.'
                ]
            ];

            foreach ($reviews as $review) {
                DesvitaReview::create($review);
            }
        }
    }
} 