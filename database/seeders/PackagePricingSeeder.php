<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\Destination;
use App\Models\PackagePricing;

class PackagePricingSeeder extends Seeder
{
    public function run()
    {
        $packages = Package::all();
        $destinations = Destination::all();

        foreach ($packages as $package) {
            foreach ($destinations as $destination) {
                PackagePricing::create([
                    'package_id' => $package->id,
                    'destination_id' => $destination->id,
                    'price' => rand(50000, 500000), // Random price between 500k and 5M IDR
                ]);
            }
        }
    }
}
