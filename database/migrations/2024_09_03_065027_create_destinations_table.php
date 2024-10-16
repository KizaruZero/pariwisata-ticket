<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('region_id')->constrained('regions');
            $table->string('image_url')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->float('rating')->default(0);
            $table->integer('total_reviews')->default(0);
            $table->integer('total_orders')->default(0);
            $table->integer('total_views')->default(0);
            $table->integer('total_likes')->default(0);
            $table->FLOAT('popularity')->default(0.0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
