<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Region;

class DestinationSeeder extends Seeder
{
    public function run()
    {

        $categories = Category::all();
        $regions = Region::all();

        $destinations = [
            // Wilayah Bali
            [
                'name' => 'Pura Tanah Lot',
                'description' => 'Pura Tanah Lot adalah salah satu Pura yang sangat disucikan di Bali, Indonesia. Di sini ada dua Pura yang terletak di atas batu besar. Satu terletak di atas bongkahan batu dan satunya terletak di atas tebing mirip dengan Pura Uluwatu. Pura Tanah Lot ini merupakan bagian dari Pura Dang Kahyangan',
                'location' => 'Tabanan, Bali',
                'category_id' => $categories->where('name', 'Budaya')->first()->id, // Budaya
                'region_id' => $regions->where('name', operator: 'Bali')->first()->id,   // Bali
                'image_url' => 'tanah_lot.jpg',
                'total_views' => 45000,
                'total_likes' => 2700,
                'popularity' => 0,
            ],
            [
                'name' => 'Pura Ulun Danu Beratan',
                'description' => 'Pura Ulun Danu Beratan adalah pura air yang terletak di tepi Danau Beratan, Bedugul, Bali. Pura ini dikenal dengan arsitektur yang indah dan posisinya yang berada di atas danau, menciptakan pemandangan yang sangat menakjubkan. Pengunjung sering datang ke pura ini untuk beribadah dan menikmati keindahan alam sekitarnya.',
                'location' => 'Tabanan, Bali',
                'category_id' => $categories->where('name', 'Budaya')->first()->id, // Budaya
                'region_id' => $regions->where('name', operator: 'Bali')->first()->id,  // Bali
                'image_url' => 'pura_ulun.png',
                'total_views' => 42000,
                'total_likes' => 2600,
                'popularity' => 0,
            ],
            [
                'name' => 'Kintamani',
                'description' => 'Kintamani adalah sebuah kecamatan di Kabupaten Bangli, Provinsi Bali, Indonesia. Kintamani juga merupakan kawasan wisata pemandangan alam di Bali, Indonesia. Kintamani banyak dihuni oleh penduduk asli Bali, Bali Aga mereka kebanyakan tinggal di sekitar pengunaan gunung Batur Suku Bali Aga mengunakan bahasa Bali Aga.',
                'location' => 'Bangli, Bali',
                'category_id' => $categories->where('name', 'Gunung')->first()->id, // Budaya
                'region_id' => $regions->where('name', operator: 'Bali')->first()->id,   // Bali
                'image_url' => 'kintamani.jpg',
                'total_views' => 38000,
                'total_likes' => 2200,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Kuta',
                'description' => 'Pantai Kuta adalah destinasi wisata yang paling populer di Bali, terkenal dengan pemandangan matahari terbenam yang menakjubkan, ombak yang cocok untuk berselancar, serta keindahan pasir putih yang membentang luas. Pantai ini juga dilengkapi dengan berbagai fasilitas seperti restoran, bar, dan tempat belanja, menjadikannya lokasi yang sempurna untuk bersantai.',
                'location' => 'Kuta, Bali',
                'category_id' => $categories->where('name', 'Pantai')->first()->id, // Alam
                'region_id' => $regions->where('name', operator: 'Bali')->first()->id,   // Bali
                'image_url' => 'pantai_kuta.jpg',
                'total_views' => 50000,
                'total_likes' => 2500,
                'popularity' => 0,  // Ini akan dihitung otomatis
            ],
            [
                'name' => 'Pura Luhur Uluwatu',
                'description' => 'Pura Luhur Uluwatu adalah pura yang terletak di tebing tinggi dengan pemandangan Samudera Hindia yang menakjubkan. Pura ini merupakan salah satu dari sembilan pura yang dianggap sebagai penyangga pulau Bali. Setiap sore, pengunjung dapat menikmati pertunjukan tari Kecak yang diadakan di panggung terbuka dengan latar belakang matahari terbenam yang memukau.',
                'location' => 'Pecatu, Bali',
                'category_id' => $categories->where('name', 'Budaya')->first()->id,
                'region_id' => $regions->where('name', 'Bali')->first()->id,
                'image_url' => 'pura_uluwatu.jpg',
                'total_views' => 47000,
                'total_likes' => 2800,
                'popularity' => 0,
            ],
            [
                'name' => 'Goa Gajah',
                'description' => 'Goa Gajah, atau Gua Gajah, adalah situs bersejarah yang dikenal dengan arsitektur kuno dan suasana yang tenang. Gua ini dibangun pada abad ke-11 dan memiliki relief yang indah serta kolam pemandian yang dikelilingi pepohonan hijau. Pengunjung dapat merasakan ketenangan saat menjelajahi area ini dan menikmati suasana spiritual yang kental.',
                'location' => 'Ubud, Bali',
                'category_id' => $categories->where('name', 'Gua')->first()->id,
                'region_id' => $regions->where('name', 'Bali')->first()->id,
                'image_url' => 'goa_gajah.jpeg',
                'total_views' => 39000,
                'total_likes' => 2100,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Nusa Dua',
                'description' => 'Pantai Nusa Dua dikenal dengan keindahan pasir putihnya dan air laut yang jernih. Tempat ini merupakan salah satu destinasi wisata mewah di Bali, lengkap dengan resor bintang lima dan lapangan golf. Pantai ini juga menawarkan berbagai aktivitas air seperti snorkeling, jet ski, dan parasailing, serta area untuk bersantai di bawah sinar matahari.',
                'location' => 'Nusa Dua, Bali',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Bali')->first()->id,
                'image_url' => 'Nusadua.jpg',
                'total_views' => 52000,
                'total_likes' => 2700,
                'popularity' => 0,
            ],
            [
                'name' => 'Ubud Monkey Forest',
                'description' => 'Mandala Suci Wenara Wana atau disebut juga Monkey Forest Ubud merupakan sebuah tempat cagar alam dan kompleks candi yang terletak di desa Padangtegal Ubud, Bali. Di tempat ini mempunyai kurang lebih 1260 ekor monyet ekor panjang ',
                'location' => 'Ubud, Bali',
                'category_id' => $categories->where('name', 'Hutan')->first()->id,
                'region_id' => $regions->where('name', 'Bali')->first()->id,
                'image_url' => 'monkey_forest.jpg',
                'total_views' => 46000,
                'total_likes' => 2300,
                'popularity' => 0,
            ],
            [
                'name' => 'Pura Taman Saraswati',
                'description' => 'Pura Taman Saraswati adalah pura yang indah dengan kolam teratai yang mempesona. Terletak di Ubud, pura ini didedikasikan untuk Dewi Saraswati, dewi ilmu pengetahuan dan seni. Pengunjung dapat menikmati keindahan arsitektur pura, kolam teratai, serta suasana tenang yang menginspirasi.',
                'location' => 'Ubud, Bali',
                'category_id' => $categories->where('name', 'Budaya')->first()->id,
                'region_id' => $regions->where('name', 'Bali')->first()->id,
                'image_url' => 'taman_saraswati.jpg',
                'total_views' => 28000,
                'total_likes' => 1900,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Jimbaran',
                'description' => 'Pantai Jimbaran terkenal dengan hidangan seafood yang lezat dan suasana romantis saat matahari terbenam. Di sepanjang pantai, terdapat banyak restoran yang menyajikan berbagai hidangan laut segar. Pengunjung dapat menikmati makan malam dengan pemandangan laut yang menakjubkan, menjadikannya pengalaman yang tak terlupakan.',
                'location' => 'Jimbaran, Bali',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Bali')->first()->id,
                'image_url' => 'pantai_jimbaran.jpg',
                'total_views' => 50000,
                'total_likes' => 2600,
                'popularity' => 0,
            ],
            [
                'name' => 'Tanjung Benoa',
                'description' => 'Tanjung Benoa adalah kawasan wisata bahari yang terkenal dengan aktivitas olahraga air. Di sini, pengunjung dapat menikmati berbagai aktivitas seperti banana boat, parasailing, dan snorkeling. Dengan pantai berpasir putih dan air jernih, Tanjung Benoa adalah lokasi yang sempurna untuk bersenang-senang dan bersantai di bawah sinar matahari.',
                'location' => 'Tanjung Benoa, Bali',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Bali')->first()->id,
                'image_url' => 'tanjung_benoa.jpg',
                'total_views' => 45000,
                'total_likes' => 2200,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Pandawa',
                'description' => 'Pantai Pandawa adalah salah satu tempat wisata di area Kuta selatan, Kabupaten Badung, Bali. Pantai ini terletak di balik perbukitan dan sering disebut sebagai Pantai Rahasia. Di sekitar pantai ini terdapat dua tebing yang sangat besar yang pada salah satu sisinya dipahat lima patung Pandawa dan Kunti.',
                'location' => 'Badung, Bali',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Bali')->first()->id,
                'image_url' => 'pantai_pandawa.jpg',
                'total_views' => 27000,
                'total_likes' => 1300,
                'popularity' => 0,
            ],
            // Yogyakarta
            [
                'name' => 'Candi Borobudur',
                'description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia dan merupakan salah satu situs Warisan Dunia UNESCO. Terletak di Magelang, tidak jauh dari Yogyakarta, Borobudur menawarkan keindahan arsitektur dengan relief yang menceritakan kehidupan Buddha. Pengunjung sering datang untuk melihat pemandangan sunrise yang memukau di atas candi.',
                'location' => 'Magelang, Yogyakarta',
                'category_id' => $categories->where('name', 'Budaya')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta
                'image_url' => 'candi_borobudur.jpg',
                'total_views' => 60000,
                'total_likes' => 3000,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Parangtritis',
                'description' => 'Pantai Parangtritis adalah pantai paling terkenal di Yogyakarta, terletak sekitar 27 km dari pusat kota. Pantai ini dikenal dengan pasir vulkanik hitamnya dan ombak yang besar. Selain pemandangan pantai yang indah, pengunjung juga dapat menikmati wahana paralayang atau sekedar menikmati sunset yang memesona.',
                'location' => 'Parangtritis, Yogyakarta',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta,   // Yogyakarta
                'image_url' => 'pantai_parangtritis.jpg',
                'total_views' => 35000,
                'total_likes' => 2200,
                'popularity' => 0,
            ],
            [
                'name' => 'Candi Prambanan',
                'description' => 'Candi Prambanan adalah kompleks candi Hindu terbesar di Indonesia, terletak di Klaten, Jawa Tengah. Candi ini merupakan salah satu situs Warisan Dunia UNESCO dan menawarkan keindahan arsitektur dengan relief yang menggambarkan kisah Ramayana. Pengunjung dapat menikmati pertunjukan tari Ramayana di malam hari dengan latar belakang candi yang megah.',
                'location' => 'Klaten, Yogyakarta',
                'category_id' => $categories->where('name', 'Budaya')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta
                'image_url' => 'prambanan.jpg',
                'total_views' => 58000,
                'total_likes' => 2800,
                'popularity' => 0,
            ],
            [
                'name' => 'Taman Sari',
                'description' => 'Taman Sari adalah kompleks keraton yang terletak di Yogyakarta, Indonesia. Taman ini dulunya merupakan tempat rekreasi dan istana pribadi bagi Sultan Yogyakarta. Pengunjung dapat menjelajahi kompleks ini yang terdiri dari taman, kolam, dan bangunan bersejarah yang indah.',
                'location' => 'Yogyakarta, Indonesia',
                'category_id' => $categories->where('name', 'Budaya')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta
                'image_url' => 'taman_sari.jpg',
                'total_views' => 42000,
                'total_likes' => 2500,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Baron',
                'description' => 'Pantai Baron adalah salah satu pantai yang terletak di Gunungkidul, Yogyakarta. Pantai ini terkenal dengan pasir putihnya dan ombak yang cocok untuk berselancar. Pengunjung dapat menikmati pemandangan pantai yang indah, berenang, atau bersantai di bawah sinar matahari.',
                'location' => 'Gunung Kidul, Yogyakarta',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta
                'image_url' => 'pantai_baron.jpg',
                'total_views' => 38000,
                'total_likes' => 2300,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Wediombo',
                'description' => 'Pantai Wediombo adalah salah satu pantai yang terletak di Gunungkidul, Yogyakarta. Pantai ini terkenal dengan pasir putihnya dan ombak yang cocok untuk berselancar. Pengunjung dapat menikmati pemandangan pantai yang indah, berenang, atau bersantai di bawah sinar matahari.',
                'location' => 'Gunung Kidul, Yogyakarta',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta
                'image_url' => 'pantai_wediombo.jpg',
                'total_views' => 24300,
                'total_likes' => 2300,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Indrayanti',
                'description' => 'Pantai Indrayanti adalah salah satu pantai yang terletak di Gunungkidul, Yogyakarta. Pantai ini terkenal dengan pasir putihnya dan ombak yang cocok untuk berselancar. Pengunjung dapat menikmati pemandangan pantai yang indah, berenang, atau bersantai di bawah sinar matahari.',
                'location' => 'Gunung Kidul, Yogyakarta',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta
                'image_url' => 'pantai_indrayanti.jpg',
                'total_views' => 28000,
                'total_likes' => 2500,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Krakal',
                'description' => 'Pantai Krakal adalah salah satu pantai yang terletak di Gunungkidul, Yogyakarta. Pantai ini terkenal dengan pasir putihnya dan ombak yang cocok untuk berselancar. Pengunjung dapat menikmati pemandangan pantai yang indah, berenang, atau bersantai di bawah sinar matahari.',
                'location' => 'Gunung Kidul, Yogyakarta',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta
                'image_url' => 'pantai_krakal.jpg',
                'total_views' => 32000,
                'total_likes' => 2400,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Sadranan',
                'description' => 'Pantai Sadranan adalah salah satu pantai yang terletak di Gunungkidul, Yogyakarta. Pantai ini terkenal dengan pasir putihnya dan ombak yang cocok untuk berselancar. Pengunjung dapat menikmati pemandangan pantai yang indah, berenang, atau bersantai di bawah sinar matahari.',
                'location' => 'Gunung Kidul, Yogyakarta',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta
                'image_url' => 'Pantai_Sadranan.jpg',
                'total_views' => 29000,
                'total_likes' => 2300,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Sundak',
                'description' => 'Pantai Sundak adalah salah satu pantai yang terletak di Gunungkidul, Yogyakarta. Pantai ini terkenal dengan pasir putihnya dan ombak yang cocok untuk berselancar. Pengunjung dapat menikmati pemandangan pantai yang indah, berenang, atau bersantai di bawah sinar matahari.',
                'location' => 'Gunung Kidul, Yogyakarta',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,   // Yogyakarta
                'image_url' => 'pantai_sundak.jpg',
                'total_views' => 27000,
                'total_likes' => 2200,
                'popularity' => 0,
            ],
            [
                'name' => 'Goa Pindul',
                'description' => 'Goa Pindul merupakan salah satu wisata alam di Gunungkidul yang terkenal dengan susur goanya. Pengunjung dapat mengapung di atas ban karet sembari menikmati stalaktit dan stalagmit yang menawan.',
                'location' => 'Gunungkidul, Yogyakarta',
                'category_id' => $categories->where('name', 'Gua')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,
                'image_url' => 'goa_pindul.jpg',
                'total_views' => 48000,
                'total_likes' => 2700,
                'popularity' => 0,
            ],
            // Jawa Barat

            [
                'name' => 'Kawah Putih',
                'description' => 'Kawah Putih adalah danau vulkanik yang terletak di Ciwidey, Bandung. Danau ini terkenal dengan airnya yang berwarna putih kehijauan dan pemandangan sekitar yang indah.
                ',
                'location' => 'Bandung, Jawa Barat',
                'category_id' => $categories->where('name', 'Danau')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Barat')->first()->id,   // Jawa Barat
                'image_url' => 'Kawah_Putih.jpg',
                'total_views' => 42000,
                'total_likes' => 2500,
                'popularity' => 0,
            ],
            [
                'name' => 'Tebing Keraton',
                'description' => 'Tebing Keraton adalah salah satu destinasi wisata alam yang terletak di Bandung, Jawa Barat. Tebing ini menawarkan pemandangan yang spektakuler dengan latar belakang hamparan sawah dan pegunungan. Pengunjung dapat menikmati keindahan alam, berfoto, atau sekadar bersantai di atas tebing.',
                'location' => 'Bandung, Jawa Barat',
                'category_id' => $categories->where('name', 'Gunung')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Barat')->first()->id,   // Jawa Barat
                'image_url' => 'tebing_keraton.jpg',
                'total_views' => 38000,
                'total_likes' => 2300,
                'popularity' => 0,
            ],
            [
                'name' => 'Tangkuban Perahu',
                'description' => 'Tangkuban Perahu adalah gunung berapi yang terletak di Lembang, Bandung. Gunung ini terkenal dengan kawahnya yang besar dan pemandangan alam yang menakjubkan
                ',
                'location' => 'Bandung, Jawa Barat',
                'category_id' => $categories->where('name', 'Gunung')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Barat')->first()->id,   // Jawa Barat
                'image_url' => 'tangkuban_perahu.jpg',
                'total_views' => 45000,
                'total_likes' => 2600,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Pangandaran',
                'description' => 'Pantai Pangandaran adalah salah satu pantai terbaik di Jawa Barat yang terletak di Pangandaran. Pantai ini terkenal dengan pasir putihnya, ombak yang cocok untuk berselancar, dan keindahan alamnya. Pengunjung dapat menikmati berbagai aktivitas air, berjemur di bawah sinar matahari, atau menikmati makanan laut segar di sekitar pantai.',
                'location' => 'Pangandaran, Jawa Barat',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Barat')->first()->id,   // Jawa Barat
                'image_url' => 'Pantai_Pangandaran.jpg',
                'total_views' => 50000,
                'total_likes' => 2800,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Ujung Genteng',
                'description' => 'Pantai Ujung Genteng adalah salah satu pantai yang terletak di Sukabumi, Jawa Barat. Pantai ini terkenal dengan pasir putihnya, ombak yang cocok untuk berselancar, dan keindahan alamnya. Pengunjung dapat menikmati berbagai aktivitas air, berjemur di bawah sin
                ',
                'location' => 'Sukabumi, Jawa Barat',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Barat')->first()->id,   // Jawa Barat
                'image_url' => 'pantai_ujunggenteng.jpg',
                'total_views' => 42000,
                'total_likes' => 2500,
                'popularity' => 0,
            ],
            [
                'name' => 'Taman Safari Indonesia Cisarua',
                'description' => 'Taman Safari Indonesia Cisarua adalah salah satu taman safari terbaik di Indonesia yang terletak di Cisarua Bogor. Taman ini menawarkan pengalaman melihat berbagai hewan liar dari berbagai belahan dunia dalam habitat alaminya. Pengunjung dapat menikmati safari, berinteraksi dengan hewan, dan menikmati berbagai atraksi.',
                'location' => 'Bogor, Jawa Barat',
                'category_id' => $categories->where('name', 'Kebun Binatang')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Barat')->first()->id,   // Jawa Barat
                'image_url' => 'taman_safari.jpg',
                'total_views' => 48000,
                'total_likes' => 2700,
                'popularity' => 0,
            ],
            // Jawa Timur
            [
                'name' => 'Gunung Bromo',
                'description' => 'Gunung Bromo adalah salah satu gunung berapi aktif di Jawa Timur yang terkenal dengan keindahan alamnya, terutama saat sunrise. Pengunjung dapat melihat pemandangan menakjubkan dari puncak Bromo yang dikelilingi oleh lautan pasir. Lokasi ini juga sering dijadikan spot untuk kegiatan petualangan seperti mendaki dan jeep tour.',
                'location' => 'Probolinggo, Jawa Timur',
                'category_id' => $categories->where('name', 'Gunung')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Timur')->first()->id,     // Jawa Timur
                'image_url' => 'gunung_bromo.jpg',
                'total_views' => 79030,
                'total_likes' => 3200,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Klayar',
                'description' => 'Pantai Klayar terletak di Pacitan, Jawa Timur, dan terkenal dengan formasi batu karang yang unik, serta suara gemuruh dari air laut yang menyerupai suara seruling. Pantai ini juga memiliki pasir putih yang luas dan air yang jernih, menjadikannya destinasi wisata yang menarik.',
                'location' => 'Pacitan, Jawa Timur',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Timur')->first()->id,
                'image_url' => 'pantai_klayar.jpg',
                'total_views' => 58000,
                'total_likes' => 2400,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Pulau Merah',
                'description' => 'Pantai Pulau Merah di Banyuwangi menawarkan pemandangan yang indah dengan bukit kecil yang terletak tak jauh dari garis pantai. Ombak di pantai ini sangat cocok untuk kegiatan selancar, dan wisatawan dapat menikmati suasana yang tenang serta sunset yang menakjubkan.',
                'location' => 'Banyuwangi, Jawa Timur',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Timur')->first()->id,
                'image_url' => 'Pantai_PulauMerah.jpg',
                'total_views' => 63000,
                'total_likes' => 3100,
                'popularity' => 0,
            ],
            [
                'name' => 'Gunung Semeru',
                'description' => 'Gunung Semeru adalah gunung tertinggi di Pulau Jawa dan menjadi destinasi favorit para pendaki. Dengan puncaknya, Mahameru, yang menjulang hingga 3.676 meter di atas permukaan laut, Gunung Semeru menawarkan pemandangan luar biasa dan tantangan tersendiri bagi para pecinta alam.',
                'location' => 'Lumajang, Jawa Timur',
                'category_id' => $categories->where('name', 'Gunung')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Timur')->first()->id,
                'image_url' => 'gunung_Semeru.jpg',
                'total_views' => 87000,
                'total_likes' => 4500,
                'popularity' => 0,
            ],
            [
                'name' => 'Air Terjun Tumpak Sewu',
                'description' => 'Air Terjun Tumpak Sewu merupakan salah satu air terjun terindah di Indonesia yang terletak di perbatasan Kabupaten Lumajang dan Malang. Keindahan air terjun ini sering disebut mirip dengan Niagara karena debit air yang besar dan ketinggiannya yang menjulang.',
                'location' => 'Lumajang, Jawa Timur',
                'category_id' => $categories->where('name', 'Air Terjun')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Timur')->first()->id,
                'image_url' => 'tumpak_Sewu.jpg',
                'total_views' => 68000,
                'total_likes' => 4000,
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Balekambang',
                'description' => 'Pantai Balekambang terkenal dengan pura yang terletak di pulau karang kecil di lepas pantai. Pantai ini sering dijuluki "Tanah Lot-nya Jawa Timur" karena kemiripannya dengan Tanah Lot di Bali. Balekambang menawarkan pemandangan pantai yang indah dan cocok untuk berlibur bersama keluarga.',
                'location' => 'Malang, Jawa Timur',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Timur')->first()->id, // Jawa Timur
                'image_url' => 'Pantai_Balekambang.png',
                'total_views' => 50000,
                'total_likes' => 2800,
                'popularity' => 0,
            ],
            [
                'name' => 'Gunung Ijen',
                'description' => 'Gunung Ijen terkenal dengan fenomena api biru yang hanya bisa dilihat saat dini hari. Selain itu, kawah Ijen yang memiliki danau asam berwarna hijau toska menjadi salah satu daya tarik wisata di kawasan ini.',
                'location' => 'Banyuwangi, Jawa Timur',
                'category_id' => $categories->where('name', 'Gunung')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Timur')->first()->id,
                'image_url' => 'gunung_ijen.jpg',
                'total_views' => 58000,
                'total_likes' => 3100,
                'popularity' => 0,
            ],
            [
                'name' => 'Ranu Kumbolo',
                'description' => 'Ranu Kumbolo adalah danau di kawasan Gunung Semeru yang terkenal sebagai tempat berkemah bagi para pendaki. Dengan airnya yang tenang dan pemandangan pegunungan yang menakjubkan, tempat ini sering dianggap sebagai salah satu permata tersembunyi di Jawa Timur.',
                'location' => 'Malang, Jawa Timur',
                'category_id' => $categories->where('name', 'Danau')->first()->id,
                'region_id' => $regions->where('name', 'Jawa Timur')->first()->id,
                'image_url' => 'ranu_kumbolo.jpeg',
                'total_views' => 46000,
                'total_likes' => 2800,
                'popularity' => 0,
            ],
            // NTT
            [
                'name' => 'Danau Kelimutu',
                'description' => 'Danau Kelimutu terkenal dengan tiga warna yang berbeda-beda yang sering berubah seiring waktu. Danau ini berada di puncak Gunung Kelimutu dan menjadi salah satu keajaiban alam yang memukau di Nusa Tenggara Timur.',
                'location' => 'Ende, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Danau')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'danau_kelimutu.jpg',
                'total_views' => rand(20000, 60000),
                'total_likes' => rand(1500, 4000),
                'popularity' => 0,
            ],
            [
                'name' => 'Taman Nasional Pulau Komodo',
                'description' => 'Taman Nasional Pulau Komodo adalah habitat alami bagi komodo, spesies kadal terbesar di dunia. Selain itu, kawasan ini juga menawarkan pemandangan alam bawah laut yang luar biasa dan merupakan salah satu destinasi snorkeling dan diving terbaik.',
                'location' => 'Labuan Bajo, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Rekreasi')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'pulau_komodo.jpg',
                'total_views' => rand(40000, 90000),
                'total_likes' => rand(3000, 6000),
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Oetune',
                'description' => 'Pantai Oetune menawarkan hamparan pasir putih yang lembut dan deburan ombak yang menenangkan. Pantai ini menjadi tempat favorit untuk bersantai dan menikmati suasana tenang di Nusa Tenggara Timur.',
                'location' => 'Kupang, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'pantai_oetune.jpg',
                'total_views' => rand(15000, 50000),
                'total_likes' => rand(1000, 3000),
                'popularity' => 0,
            ],
            [
                'name' => 'Desa Wae Rebo',
                'description' => 'Desa Wae Rebo adalah desa tradisional yang terletak di pegunungan terpencil Flores. Terkenal dengan rumah-rumah adat berbentuk kerucut, desa ini menawarkan pengalaman budaya yang unik bagi wisatawan yang ingin melihat kehidupan masyarakat lokal.',
                'location' => 'Manggarai, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Budaya')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'desa_wae_rebo.jpg',
                'total_views' => rand(10000, 40000),
                'total_likes' => rand(800, 2500),
                'popularity' => 0,
            ],
            [
                'name' => 'Air Terjun Oenesu',
                'description' => 'Air Terjun Oenesu adalah salah satu air terjun yang paling terkenal di Kupang. Dengan empat tingkat air terjun yang indah dan suasana hutan yang hijau, tempat ini menjadi tujuan populer untuk bersantai dan menikmati alam.',
                'location' => 'Kupang, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Air Terjun')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'air_terjun_oenesu.jpg',
                'total_views' => rand(15000, 45000),
                'total_likes' => rand(1000, 2800),
                'popularity' => 0,
            ],
            [
                'name' => 'Goa Kristal Bolok',
                'description' => 'Goa Kristal Bolok adalah sebuah gua dengan kolam air yang jernih seperti kristal. Airnya yang dingin dan pemandangan di dalam gua membuatnya menjadi tempat yang menarik untuk berenang dan eksplorasi.',
                'location' => 'Kupang, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Gua')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'goa_kristal_bolok.jpg',
                'total_views' => rand(8000, 30000),
                'total_likes' => rand(600, 2000),
                'popularity' => 0,
            ],
            [
                'name' => 'Pantai Nihiwatu',
                'description' => 'Pantai Nihiwatu adalah salah satu pantai terbaik di dunia yang terkenal dengan ombaknya yang menantang dan pemandangan yang spektakuler. Pantai ini cocok bagi peselancar dan juga bagi mereka yang ingin menikmati keindahan alam yang tenang.',
                'location' => 'Sumba Barat, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'pantai_nihiwatu.jpg',
                'total_views' => rand(30000, 80000),
                'total_likes' => rand(2500, 5000),
                'popularity' => 0,
            ],
            [
                'name' => 'Weekuri Lagoon',
                'description' => 'Laguna Weekuri adalah laguna air asin yang indah di Pulau Sumba. Tempat ini terkenal dengan airnya yang jernih dan berwarna biru toska, serta suasana yang tenang. Pengunjung bisa berenang dan menikmati pemandangan alam yang eksotis.',
                'location' => 'Sumba Barat Daya, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Danau')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'weekuri_lagoon.jpg',
                'total_views' => rand(25000, 55000),
                'total_likes' => rand(1500, 3500),
                'popularity' => 0,
            ],
            [
                'name' => 'Gunung Inerie',
                'description' => 'Gunung Inerie adalah salah satu gunung tertinggi di Pulau Flores dengan bentuk kerucut yang indah. Gunung ini menjadi tempat favorit bagi pendaki yang ingin menikmati pemandangan spektakuler dari puncak, termasuk pemandangan desa tradisional Bena.',
                'location' => 'Ngada, Flores, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Gunung')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'gunung_inerie.jpg',
                'total_views' => rand(20000, 45000),
                'total_likes' => rand(1200, 3200),
                'popularity' => 0,
            ],
            [
                'name' => 'Rangko Cave',
                'description' => 'Goa Rangko adalah gua dengan kolam air biru yang sangat jernih di dalamnya. Gua ini menjadi tempat populer bagi wisatawan yang ingin berenang dan merasakan keindahan alam tersembunyi di kawasan Labuan Bajo.',
                'location' => 'Labuan Bajo, Nusa Tenggara Timur',
                'category_id' => $categories->where('name', 'Gua')->first()->id,
                'region_id' => $regions->where('name', 'Nusa Tenggara Timur')->first()->id,
                'image_url' => 'rangko_cave.jpg',
                'total_views' => rand(12000, 38000),
                'total_likes' => rand(900, 2700),
                'popularity' => 0,
            ],
        ];
        foreach ($destinations as &$destination) {
            $destination['price'] = rand(10000, 150000);
        }
        foreach ($destinations as $destination) {
            $newDestination = Destination::create($destination);
            $newDestination->updatePopularity(); // Memperbarui nilai popularity
        }
    }
}
