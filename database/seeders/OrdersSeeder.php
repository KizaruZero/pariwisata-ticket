<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Destination;
use App\Models\User;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();  // Mendapatkan semua pengguna
        $destinations = Destination::all();  // Mendapatkan semua destinasi

        $orders = [];  // Inisialisasi array untuk menyimpan data pesanan

        foreach ($destinations as $destination) {
            $quantity = rand(1, 5);  // Random kuantitas pesanan antara 1 hingga 5

            // Membuat data pesanan
            $orders[] = [
                'user_id' => $users->random()->id,  // Random pengguna
                'destination_id' => $destination->id,  // ID destinasi
                'quantity' => $quantity,  // Kuantitas yang dipesan
                'total_price' => $destination->price * $quantity,  // Hitung total harga berdasarkan quantity
                'payment_method' => 'transfers',  // Metode pembayaran
                'status' => rand() % 2 === 0 ? 'approved' : 'pending',  // Random status pesanan
                'booking_date' => Carbon::now()->subDays(rand(1, 30)),  // Random tanggal booking dalam 30 hari terakhir
                'created_at' => Carbon::now(),  // Waktu pembuatan
                'updated_at' => Carbon::now(),  // Waktu update
            ];
        }

        // Insert semua data pesanan ke dalam database
        Order::insert($orders);
    }
}
