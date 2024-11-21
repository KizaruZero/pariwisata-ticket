<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => 1,
            'destination_id' => 1,
            'quantity' => $this->faker->numberBetween(1, 10),
            'total_price' => $this->faker->numberBetween(100000, 1000000),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'booking_date' => $this->faker->dateTimeThisYear(),
            'payment_proof' => $this->faker->imageUrl(640, 480, 'payment', true),
            'payment_method' => $this->faker->randomElement(['credit_card', 'bank_transfer', 'cash']),
        ];
    }
}
