<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Destination;
use App\Models\User;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $destinations = Destination::all();

        foreach ($destinations as $destination) {
            $quantity = rand(1, 5);
            $status = rand() % 2 === 0 ? 'approved' : 'pending';

            Order::create([
                'user_id' => $users->random()->id,
                'destination_id' => $destination->id,
                'quantity' => $quantity,
                'total_price' => $destination->price * $quantity,
                'payment_method' => 'transfers',
                'payment_proof' => 'payment_proof.jpg',
                'status' => $status,
                'booking_date' => Carbon::now()->subDays(rand(1, 30)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            if ($status === 'approved') {
                $destination->updateTotalOrders();
            }
        }
    }
}