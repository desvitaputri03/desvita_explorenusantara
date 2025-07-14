<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DesvitaDestination;

class DesvitaDestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DesvitaDestination::create([
            'name' => 'Air Terjun Harau',
            'description' => 'Air terjun yang indah dengan ketinggian 100 meter, dikelilingi oleh tebing-tebing batu yang menjulang tinggi. Tempat yang sempurna untuk menikmati keindahan alam dan berfoto.',
            'location' => 'Harau, Lima Puluh Kota',
            'image' => 'destinations/air-terjun-harau.jpg'
        ]);

        DesvitaDestination::create([
            'name' => 'Danau Singkarak',
            'description' => 'Danau terbesar kedua di Sumatera Barat dengan pemandangan yang memukau. Pengunjung dapat menikmati perahu tradisional, memancing, atau sekadar menikmati sunset.',
            'location' => 'Singkarak, Solok',
            'image' => 'destinations/danau-singkarak.jpg'
        ]);

        DesvitaDestination::create([
            'name' => 'Bukit Barisan',
            'description' => 'Pegunungan yang membentang dari utara ke selatan Sumatera. Menawarkan trekking, camping, dan pemandangan alam yang spektakuler.',
            'location' => 'Bukit Barisan, Lima Puluh Kota',
            'image' => 'destinations/bukit-barisan.jpg'
        ]);

        DesvitaDestination::create([
            'name' => 'Kampung Adat Minangkabau',
            'description' => 'Kampung tradisional Minangkabau dengan rumah gadang yang megah. Pengunjung dapat belajar budaya, melihat pertunjukan tari, dan mencicipi kuliner tradisional.',
            'location' => 'Batusangkar, Tanah Datar',
            'image' => 'destinations/kampung-adat.jpg'
        ]);

        DesvitaDestination::create([
            'name' => 'Pantai Air Manis',
            'description' => 'Pantai yang indah dengan pasir putih dan air jernih. Cocok untuk berenang, snorkeling, atau sekadar bersantai menikmati angin laut.',
            'location' => 'Padang, Sumatera Barat',
            'image' => 'destinations/pantai-air-manis.jpg'
        ]);

        DesvitaDestination::create([
            'name' => 'Gunung Marapi',
            'description' => 'Gunung berapi aktif dengan pemandangan yang menakjubkan. Menawarkan trekking yang menantang dan pemandangan kota dari ketinggian.',
            'location' => 'Agam, Sumatera Barat',
            'image' => 'destinations/gunung-marapi.jpg'
        ]);
    }
}
