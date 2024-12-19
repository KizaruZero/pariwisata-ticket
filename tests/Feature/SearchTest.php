<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Region;

class SearchTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testDestinationFilterByCategoryAndRegion()
    {
        // Buat data untuk pengujian
        $search = "Pantai Kuta";
        $beachCategory = Category::factory()->create(['name' => 'Beach']);
        $mountainCategory = Category::factory()->create(['name' => 'Mountain']);
        $baliRegion = Region::factory()->create(['name' => 'Bali']);
        $javaRegion = Region::factory()->create(['name' => 'Java']);

        Destination::factory()->create([
            'name' => 'Pantai Kuta',
            'category_id' => $beachCategory->id,
            'region_id' => $baliRegion->id,
        ]);

        Destination::factory()->create([
            'name' => 'Bromo Mountain',
            'category_id' => $mountainCategory->id,
            'region_id' => $javaRegion->id,
        ]);

        // Kirim request ke endpoint dengan filter kategori dan region
        $response = $this->getJson('/api/destinations?search=' . $search . '&category=' . $beachCategory->id . '&region=' . $baliRegion->id);

        if ($response->getStatusCode() != 200) {
           $this->fail('Failed to get response from /api/destinations');
        }
        // Pastikan responsnya benar
        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')  // Harusnya hanya 1 destinasi
            ->assertJsonFragment(['name' => 'Pantai Kuta'])
            ->assertJsonMissing(['name' => 'Bromo Mountain']);
    }
}