<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Pantai', 'description' => 'Tempat wisata pantai'],
            ['name' => 'Gunung', 'description' => 'Tempat wisata gunung'],
            ['name' => 'Danau', 'description' => 'Tempat wisata danau'],
            ['name' => 'Air Terjun', 'description' => 'Tempat wisata air terjun'],
            ['name' => 'Hutan', 'description' => 'Tempat wisata hutan'],
            ['name' => 'Taman', 'description' => 'Tempat wisata taman'],
            ['name' => 'Museum', 'description' => 'Tempat wisata museum'],
            ['name' => 'Kebun Binatang', 'description' => 'Tempat wisata kebun binatang'],
            ['name' => 'Pulau', 'description' => 'Tempat wisata pulau'],
            ['name' => 'Gua', 'description' => 'Tempat wisata gua'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
