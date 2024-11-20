<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Destination;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    protected $model = Destination::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'location' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100000, 1000000),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'category_id' => 1,
            'region_id' => 1,
            'image_url' => UploadedFile::fake()->image('product.jpg'), // Simulate file upload
        ];
    }
}
