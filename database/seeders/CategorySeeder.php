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
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
