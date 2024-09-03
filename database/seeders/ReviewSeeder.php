<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Destination;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $destinations = Destination::all();

        foreach ($destinations as $destination) {
            for ($i = 0; $i < rand(5, 10); $i++) {
                Review::create([
                    'user_id' => $users->random()->id,
                    'destination_id' => $destination->id,
                    'rating' => rand(1, 5),
                    'review_text' => 'This is a review for ' . $destination->name,
                ]);
            }
        }
    }
}
