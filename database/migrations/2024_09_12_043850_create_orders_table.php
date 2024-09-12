<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // pembeli
            $table->foreignId('destination_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('cascade'); // paket wisata
            $table->decimal('total_price', 10, 2); // harga total
            $table->string('payment_method'); // metode pembayaran
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // status order
            $table->timestamp('approved_at')->nullable(); // waktu disetujui
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
