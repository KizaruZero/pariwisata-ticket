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
        $categories = [
            'Pantai' => Category::where('name', 'Pantai')->first()->id,
            'Gunung' => Category::where('name', 'Gunung')->first()->id,
            'Danau'  => Category::where('name', 'Danau')->first()->id,
        ];

        $regions = [
            'Bali' => Region::where('name', 'Bali')->first()->id,
            'Yogyakarta' => Region::where('name', 'Yogyakarta')->first()->id,
            'Lombok' => Region::where('name', 'Lombok')->first()->id,
        ];

        $destinations = [
            // Bali Region
            ['name' => 'Pantai Kuta', 'description' => 'Pantai terkenal di Bali.', 'location' => 'Kuta, Bali', 'category_id' => $categories['Pantai'], 'region_id' => $regions['Bali'], 'image_url' => 'https://via.placeholder.com/150', 'rating' => rand(4, 5), 'popularity' => rand(50, 100)],
            ['name' => 'Pantai Sanur', 'description' => 'Pantai cantik di sebelah timur Bali.', 'location' => 'Sanur, Bali', 'category_id' => $categories['Pantai'], 'region_id' => $regions['Bali'], 'image_url' => 'https://via.placeholder.com/150', 'rating' => rand(4, 5), 'popularity' => rand(50, 100)],
            ['name' => 'Gunung Batur', 'description' => 'Gunung berapi aktif di Bali.', 'location' => 'Kintamani, Bali', 'category_id' => $categories['Gunung'], 'region_id' => $regions['Bali'], 'image_url' => 'https://via.placeholder.com/150', 'rating' => rand(4, 5), 'popularity' => rand(50, 100)],
            ['name' => 'Danau Batur', 'description' => 'Danau kaldera yang menawan di kaki Gunung Batur.', 'location' => 'Kintamani, Bali', 'category_id' => $categories['Danau'], 'region_id' => $regions['Bali'], 'image_url' => 'https://via.placeholder.com/150', 'rating' => rand(4, 5), 'popularity' => rand(50, 100)],

            // Yogyakarta Region
            ['name' => 'Pantai Parangtritis', 'description' => 'Pantai terkenal di Yogyakarta.', 'location' => 'Parangtritis, Yogyakarta', 'category_id' => $categories['Pantai'], 'region_id' => $regions['Yogyakarta'], 'image_url' => 'https://via.placeholder.com/150', 'rating' => rand(4, 5), 'popularity' => rand(50, 100)],
            ['name' => 'Gunung Merapi', 'description' => 'Gunung berapi aktif yang sering dikunjungi wisatawan.', 'location' => 'Sleman, Yogyakarta', 'category_id' => $categories['Gunung'], 'region_id' => $regions['Yogyakarta'], 'image_url' => 'https://via.placeholder.com/150', 'rating' => rand(4, 5), 'popularity' => rand(50, 100)],

            // Lombok Region
            ['name' => 'Pantai Senggigi', 'description' => 'Pantai populer dengan pemandangan matahari terbenam yang indah.', 'location' => 'Senggigi, Lombok', 'category_id' => $categories['Pantai'], 'region_id' => $regions['Lombok'], 'image_url' => 'https://via.placeholder.com/150', 'rating' => rand(4, 5), 'popularity' => rand(50, 100)],
            ['name' => 'Gunung Rinjani', 'description' => 'Gunung tertinggi kedua di Indonesia, sangat populer untuk pendakian.', 'location' => 'Lombok, Nusa Tenggara Barat', 'category_id' => $categories['Gunung'], 'region_id' => $regions['Lombok'], 'image_url' => 'https://via.placeholder.com/150', 'rating' => rand(4, 5), 'popularity' => rand(50, 100)],
            ['name' => 'Danau Segara Anak', 'description' => 'Danau indah di kawah Gunung Rinjani.', 'location' => 'Gunung Rinjani, Lombok', 'category_id' => $categories['Danau'], 'region_id' => $regions['Lombok'], 'image_url' => 'https://via.placeholder.com/150', 'rating' => rand(4, 5), 'popularity' => rand(50, 100)],
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}
