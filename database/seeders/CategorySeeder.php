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
            ['name' => 'Museum', 'description' => 'Tempat wisata museum'],
            ['name' => 'Gua', 'description' => 'Tempat wisata gua'],
            ['name' => 'Kebun Binatang', 'description' => 'Tempat wisata kebun binatang'],
            ['name' => 'Budaya', 'description' => 'Wisata yang memamerkan kekayaan budaya, seperti candi, tarian tradisional, dan desa adat.'],
            ['name' => 'Rekreasi', 'description' => 'Wisata untuk tempat rekreasi dan hiburan.'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
