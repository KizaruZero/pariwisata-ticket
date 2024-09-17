<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RegionSeeder::class,
            CategorySeeder::class,
            DestinationSeeder::class,
            PackageSeeder::class,
            PackagePricingSeeder::class,
            OrdersSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
