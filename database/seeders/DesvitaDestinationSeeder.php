<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DesvitaDestination;

class DesvitaDestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Lembah Harau',
                'description' => 'Lembah Harau adalah destinasi wisata alam yang menakjubkan dengan tebing-tebing granit setinggi 150 meter, air terjun yang indah, dan pemandangan alam yang spektakuler. Area ini dilengkapi dengan berbagai fasilitas seperti area camping, spot foto instagramable, dan tempat piknik keluarga. Pengunjung dapat menikmati aktivitas seperti hiking, memancing, berenang di kolam alami, atau sekadar bersantai menikmati kesejukan alam.',
                'location' => 'Tarantang, Harau, Kabupaten Lima Puluh Kota, Sumatera Barat',
                'price' => 25000,
                'image' => 'destinations/harau.jpg'
            ],
            [
                'name' => 'Ngalau Indah',
                'description' => 'Ngalau Indah adalah gua alam yang memukau dengan stalaktit dan stalagmit yang terbentuk secara alami selama ribuan tahun. Gua ini memiliki beberapa ruangan dengan formasi batu yang unik dan indah. Dilengkapi dengan penerangan yang memadai dan pemandu wisata profesional, pengunjung dapat menjelajahi keindahan gua sambil belajar tentang sejarah geologisnya. Cocok untuk wisata edukasi dan petualangan.',
                'location' => 'Koto Tinggi, Payakumbuh, Kabupaten Lima Puluh Kota',
                'price' => 20000,
                'image' => 'destinations/ngalau.jpg'
            ],
            [
                'name' => 'Batang Tabik Adventure Park',
                'description' => 'Taman petualangan modern yang menawarkan berbagai aktivitas outdoor menarik. Fasilitas meliputi flying fox sepanjang 100 meter, jembatan gantung, wall climbing, dan area outbound. Tersedia juga wahana permainan air seperti arung jeram mini dan kolam renang anak. Cocok untuk kegiatan team building, gathering keluarga, atau sekadar mencari keseruan di akhir pekan.',
                'location' => 'Batang Tabik, Kabupaten Lima Puluh Kota',
                'price' => 35000,
                'image' => 'destinations/batang-tabik.jpg'
            ],
            [
                'name' => 'Bukik Bulek Taram',
                'description' => 'Destinasi wisata alam yang menawarkan pemandangan sunrise dan sunset yang memukau. Dengan ketinggian sekitar 700 meter di atas permukaan laut, pengunjung dapat melihat hamparan perbukitan dan persawahan yang indah. Tersedia area camping dengan fasilitas lengkap, gazebo untuk bersantai, dan spot foto yang instagramable. Ideal untuk pecinta fotografi dan camping.',
                'location' => 'Taram, Kabupaten Lima Puluh Kota',
                'price' => 15000,
                'image' => 'destinations/bukit-bulek.jpg'
            ],
            [
                'name' => 'Air Terjun Sarasah Tanggo',
                'description' => 'Air terjun bertingkat yang memiliki 7 tingkatan dengan ketinggian total sekitar 90 meter. Setiap tingkatan memiliki kolam alami yang dapat digunakan untuk berenang. Trek menuju air terjun telah dilengkapi dengan tangga dan pegangan yang aman. Di sekitar area terdapat berbagai spot foto menarik dan gazebo untuk beristirahat. Cocok untuk wisata keluarga dan pecinta alam.',
                'location' => 'Harau, Kabupaten Lima Puluh Kota',
                'price' => 20000,
                'image' => 'destinations/sarasah.jpg'
            ],
            [
                'name' => 'Puncak Marajo',
                'description' => 'Destinasi wisata baru yang menawarkan pengalaman wisata alam modern. Dilengkapi dengan berbagai fasilitas seperti rumah pohon, jembatan gantung dengan pemandangan spektakuler, dan kafe dengan view pegunungan. Pengunjung dapat menikmati sunset sambil bersantai di hammock atau berfoto di berbagai spot instagramable. Tempat yang sempurna untuk refreshing dan mencari konten sosial media.',
                'location' => 'Bukit Marajo, Kabupaten Lima Puluh Kota',
                'price' => 30000,
                'image' => 'destinations/marajo.jpg'
            ],
            [
                'name' => 'Kapalo Banda',
                'description' => 'Bendungan bersejarah yang telah direvitalisasi menjadi destinasi wisata modern. Selain fungsi utamanya sebagai irigasi, area ini dilengkapi dengan taman yang indah, track untuk jogging, dan berbagai spot foto menarik. Pengunjung dapat menikmati sunset yang memukau, bersepeda di sekitar bendungan, atau sekadar bersantai di pinggir danau. Tempat yang cocok untuk rekreasi keluarga dan olahraga.',
                'location' => 'Payakumbuh, Kabupaten Lima Puluh Kota',
                'price' => 10000,
                'image' => 'destinations/kapalo.jpg'
            ]
        ];

        foreach ($destinations as $destination) {
            DesvitaDestination::create($destination);
        }
    }
}
