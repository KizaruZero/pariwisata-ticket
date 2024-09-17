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
            [
                'name' => 'Pantai Kuta',
                'description' => 'Pantai Kuta adalah tempat wisata pantai yang terletak di Bali.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Bali')->first()->id,
                'location' => 'Bali, Indonesia',
                'image_url' => 'https://example.com/images/pantai_kuta.jpg',
            ],
            [
                'name' => 'Pantai Parangtritis',
                'description' => 'Pantai Parangtritis adalah tempat wisata pantai yang terletak di Yogyakarta.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Yogyakarta')->first()->id,
                'location' => 'Yogyakarta, Indonesia',
                'image_url' => 'https://example.com/images/pantai_parangtritis.jpg',
            ],
            [
                'name' => 'Pantai Ancol',
                'description' => 'Pantai Ancol adalah tempat wisata pantai yang terletak di Jakarta.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Jakarta')->first()->id,
                'location' => 'Jakarta, Indonesia',
                'image_url' => 'https://example.com/images/pantai_ancol.jpg',
            ],
            [
                'name' => 'Pantai Pangandaran',
                'description' => 'Pantai Pangandaran adalah tempat wisata pantai yang terletak di Bandung.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Bandung')->first()->id,
                'location' => 'Bandung, Indonesia',
                'image_url' => 'https://example.com/images/pantai_pangandaran.jpg',
            ],
            [
                'name' => 'Pantai Kenjeran',
                'description' => 'Pantai Kenjeran adalah tempat wisata pantai yang terletak di Surabaya.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Surabaya')->first()->id,
                'location' => 'Surabaya, Indonesia',
                'image_url' => 'https://example.com/images/pantai_kenjeran.jpg',
            ],
            [
                'name' => 'Pantai Senggigi',
                'description' => 'Pantai Senggigi adalah tempat wisata pantai yang terletak di Lombok.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Lombok')->first()->id,
                'location' => 'Lombok, Indonesia',
                'image_url' => 'https://example.com/images/pantai_senggigi.jpg',
            ],
            [
                'name' => 'Pantai Waisai',
                'description' => 'Pantai Waisai adalah tempat wisata pantai yang terletak di Raja Ampat.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Raja Ampat')->first()->id,
                'location' => 'Raja Ampat, Indonesia',
                'image_url' => 'https://example.com/images/pantai_waisai.jpg',
            ],
            [
                'name' => 'Pantai Tanjung Bira',
                'description' => 'Pantai Tanjung Bira adalah tempat wisata pantai yang terletak di Toraja.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Toraja')->first()->id,
                'location' => 'Toraja, Indonesia',
                'image_url' => 'https://example.com/images/pantai_tanjung_bira.jpg',
            ],
            [
                'name' => 'Pantai Pink Beach',
                'description' => 'Pantai Pink Beach adalah tempat wisata pantai yang terletak di Labuan Bajo.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Labuan Bajo')->first()->id,
                'location' => 'Labuan Bajo, Indonesia',
                'image_url' => 'https://example.com/images/pantai_pink_beach.jpg',
            ],
            [
                'name' => 'Pantai Parai Tenggiri',
                'description' => 'Pantai Parai Tenggiri adalah tempat wisata pantai yang terletak di Bangka Belitung.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Bangka Belitung')->first()->id,
                'location' => 'Bangka Belitung, Indonesia',
                'image_url' => 'https://example.com/images/pantai_parai_tenggiri.jpg',
            ],
            [
                'name' => 'Pantai Anyer',
                'description' => 'Pantai Anyer adalah tempat wisata pantai yang terletak di Banten.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Banten')->first()->id,
                'location' => 'Banten, Indonesia',
                'image_url' => 'https://example.com/images/pantai_anyer.jpg',
            ],
            [
                'name' => 'Pantai Sawarna',
                'description' => 'Pantai Sawarna adalah tempat wisata pantai yang terletak di Banten.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Banten')->first()->id,
                'location' => 'Banten, Indonesia',
                'image_url' => 'https://example.com/images/pantai_sawarna.jpg',
            ],
            [
                'name' => 'Pantai Ujung Genteng',
                'description' => 'Pantai Ujung Genteng adalah tempat wisata pantai yang terletak di Banten.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Banten')->first()->id,
                'location' => 'Banten, Indonesia',
                'image_url' => 'https://example.com/images/pantai_ujung_genteng.jpg',
            ],
            [
                'name' => 'Pantai Pelabuhan Ratu',
                'description' => 'Pantai Pelabuhan Ratu adalah tempat wisata pantai yang terletak di Banten.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Banten')->first()->id,
                'location' => 'Banten, Indonesia',
                'image_url' => 'https://example.com/images/pantai_pelabuhan_ratu.jpg',
            ],
            [
                'name' => 'Pantai Carita',
                'description' => 'Pantai Carita adalah tempat wisata pantai yang terletak di Banten.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Banten')->first()->id,
                'location' => 'Banten, Indonesia',
                'image_url' => 'https://example.com/images/pantai_carita.jpg',
            ],
            [
                'name' => 'Pantai Tanjung Lesung',
                'description' => 'Pantai Tanjung Lesung adalah tempat wisata pantai yang terletak di Banten.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Banten')->first()->id,
                'location' => 'Banten, Indonesia',
                'image_url' => 'https://example.com/images/pantai_tanjung_lesung.jpg',
            ],
            [
                'name' => 'Pantai Tanjung Lesung',
                'description' => 'Pantai Tanjung Lesung adalah tempat wisata pantai yang terletak di Banten.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Banten')->first()->id,
                'location' => 'Banten, Indonesia',
                'image_url' => 'https://example.com/images/pantai_tanjung_lesung.jpg',
            ],
            [
                'name' => 'Pantai Tanjung Lesung',
                'description' => 'Pantai Tanjung Lesung adalah tempat wisata pantai yang terletak di Banten.',
                'category_id' => $categories->where('name', 'Pantai')->first()->id,
                'region_id' => $regions->where('name', 'Banten')->first()->id,
                'location' => 'Banten, Indonesia',
                'image_url' => 'https://example.com/images/pantai_tanjung_lesung.jpg',
            ],
        ];
        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}
