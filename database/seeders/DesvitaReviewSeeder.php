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
        $reviews = [
            [
                'tourist_id' => 1,
                'destination_id' => 1, // Lembah Harau
                'rating' => 5,
                'comment' => 'Pengalaman yang luar biasa di Lembah Harau! Pemandangan tebing-tebing granit sangat megah, air terjunnya jernih dan sejuk. Guide sangat membantu menunjukkan spot-spot foto terbaik. Area camping dan piknik juga bersih dan nyaman. Anak-anak sangat menikmati berenang di kolam alami. Wajib dikunjungi!',
                'created_at' => '2024-02-16'
            ],
            [
                'tourist_id' => 2,
                'destination_id' => 3, // Batang Tabik Adventure Park
                'rating' => 5,
                'comment' => 'Tempat yang sempurna untuk adventure! Flying fox-nya seru banget dengan pemandangan yang cantik, wahana arung jeram mini cocok untuk pemula, dan wall climbing-nya menantang. Staff sangat profesional dan mengutamakan keselamatan. Cocok untuk family gathering atau team building. Worth every penny!',
                'created_at' => '2024-02-21'
            ],
            [
                'tourist_id' => 3,
                'destination_id' => 6, // Puncak Marajo
                'rating' => 5,
                'comment' => 'Spot wisata kekinian yang keren! View dari jembatan gantung spektakuler, rumah pohonnya unik dan instagramable. Sunset di sini memukau, apalagi dinikmati dari kafe dengan segelas kopi. Banyak spot foto yang bagus, pasti bikin feed Instagram makin aesthetic. Parkir luas dan akses mudah.',
                'created_at' => '2024-02-26'
            ],
            [
                'tourist_id' => 4,
                'destination_id' => 5, // Air Terjun Sarasah Tanggo
                'rating' => 4,
                'comment' => 'Air terjun bertingkat yang sangat indah! Setiap tingkatan punya keunikan tersendiri. Trek sudah dibuat aman dengan tangga dan pegangan. Guide sangat informatif dan sabar. Saran: bawa baju ganti karena pasti tergoda untuk berenang di kolam alaminya. Gazebo nyaman untuk istirahat.',
                'created_at' => '2024-03-02'
            ],
            [
                'tourist_id' => 5,
                'destination_id' => 4, // Bukik Bulek Taram
                'rating' => 5,
                'comment' => 'Spot camping terbaik di Lima Puluh Kota! Sunrise-nya indah banget, apalagi dengan view perbukitan dan kabut pagi. Area camping bersih, aman, dan fasilitasnya lengkap. Spot foto juga banyak dan bagus-bagus. Tips: datang sore untuk sunset, camping, lalu nikmati sunrise esok paginya.',
                'created_at' => '2024-03-06'
            ]
        ];

        foreach ($reviews as $review) {
            DesvitaReview::create($review);
        }
    }
} 