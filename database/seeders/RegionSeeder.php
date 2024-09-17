<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $regions = [
            'Bali', 'Yogyakarta', 'Jakarta', 'Bandung', 'Surabaya',
            'Lombok', 'Raja Ampat', 'Toraja', 'Labuan Bajo', 'Medan',
            'Makassar', 'Semarang', 'Malang', 'Palembang', 'Manado',
            'Banyuwangi', 'Pekalongan', 'Purwokerto', 'Purwakarta', 'Purworejo',
            'Banten', 'Labuan Bajo', 'Bukittinggi', 'Bogor', 'Bekasi', 'Bengkulu',
            'Balikpapan', 'Banjarmasin', 'Batam', 'Batu', 'Bima', 'Bangka Belitung',

        ];


        foreach ($regions as $region) {
            Region::create([
                'name' => $region,
                'description' => "Discover the beauty of $region, a unique destination in Indonesia.",
            ]);
        }
    }
}
