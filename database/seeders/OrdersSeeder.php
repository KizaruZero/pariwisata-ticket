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

        $orders = [
            [
                'user_id' => $users->random()->id,
                'package_pricing_id' => $packagePricings->random()->id,
                'payment_method' => 'credit_card',
                'status' => 'pending',
                'booking_date' => Carbon::now(),
                'approved_at' => null,
            ],
            [
                'user_id' => $users->random()->id,
                'package_pricing_id' => $packagePricings->random()->id,
                'payment_method' => 'paypal',
                'status' => 'approved',
                'booking_date' => Carbon::now()->subDays(2),
                'approved_at' => Carbon::now()->subDay(),
            ],
            [
                'user_id' => $users->random()->id,
                'package_pricing_id' => $packagePricings->random()->id,
                'payment_method' => 'bank_transfer',
                'status' => 'rejected',
                'booking_date' => Carbon::now()->subWeek(),
                'approved_at' => null,
            ],
        ];

        foreach ($orders as &$order) {
            $packagePricing = PackagePricing::find($order['package_pricing_id']);
            $order['total_price'] = $packagePricing->price;
        }

        Order::insert($orders);
    }
}