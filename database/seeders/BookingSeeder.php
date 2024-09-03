<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Package;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $packages = Package::all();

        foreach ($users as $user) {
            for ($i = 0; $i < rand(1, 3); $i++) {
                Booking::create([
                    'user_id' => $user->id,
                    'package_id' => $packages->random()->id,
                    'booking_date' => now(),
                    'number_of_people' => rand(1, 10),
                    'total_price' => rand(100000, 5000000),
                    'status' => 'confirmed',
                ]);
            }
        }
    }
}
