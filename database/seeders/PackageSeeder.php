<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            ['name' => 'Open Trip 3-5 Orang', 'deskripsi' => 'Open trip untuk 3-5 orang', 'package_type' => 'open_trip', 'group_size' => 5],
            ['name' => 'Pribadi 1-2 Orang', 'deskripsi' => 'Paket pribadi untuk 1-2 orang', 'package_type' => 'pribadi', 'group_size' => 2],
            ['name' => 'Bundling 6-10 Orang', 'deskripsi' => 'Bundling untuk 6-10 orang', 'package_type' => 'open_trip', 'group_size' => 10],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
