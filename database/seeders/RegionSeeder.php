<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $regions = [
            ['name' => 'Bali', 'description' => 'Pulau Dewata'],
            ['name' => 'Yogyakarta', 'description' => 'Kota Budaya'],
            ['name' => 'Lombok', 'description' => 'Pulau Seribu Masjid'],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
