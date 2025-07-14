<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DesvitaUserSeeder::class,
            DesvitaDestinationSeeder::class,
            DesvitaTouristSeeder::class,
            DesvitaBookingSeeder::class,
            DesvitaReviewSeeder::class,
        ]);
    }
}
