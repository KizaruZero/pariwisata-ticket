<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\PackagePricing;
use App\Models\User;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $packagePricings = PackagePricing::all();

        foreach ($packagePricings as $packagePricing) {
            $orders[] = [
                'user_id' => $users->random()->id,
                'package_pricing_id' => $packagePricing->id,
                'payment_method' => 'transfers',
                'status' => rand() % 2 === 0 ? 'approved' : 'pending',
                'booking_date' => Carbon::now()->subDays(rand(1, 30)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        foreach ($orders as &$order) {
            $packagePricing = PackagePricing::find($order['package_pricing_id']);
            $order['total_price'] = $packagePricing->price;
        }

        Order::insert($orders);
    }
}