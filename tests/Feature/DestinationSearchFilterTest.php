<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Region;

class DestinationSearchFilterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    // Setup data untuk testing
    protected function setUp(): void
    {
        parent::setUp();

        // Buat beberapa kategori
        $beach = Category::create(['name' => 'Beach']);
        $mountain = Category::create(['name' => 'Mountain']);

        // Buat beberapa region
        $bali = Region::create(['name' => 'Bali']);
        $java = Region::create(['name' => 'Java']);

        // Buat beberapa destinasi untuk testing
        Destination::create([
            'name' => 'Pantai Kuta',
            'category_id' => $beach->id,
            'region_id' => $bali->id,
            'description' => 'Pantai terkenal di Bali'
        ]);

        Destination::create([
            'name' => 'Bromo Mountain',
            'category_id' => $mountain->id,
            'region_id' => $java->id,
            'description' => 'Gunung terkenal di Jawa'
        ]);

        Destination::create([
            'name' => 'Pantai Pandawa',
            'category_id' => $beach->id,
            'region_id' => $bali->id,
            'description' => 'Pantai indah di Bali'
        ]);
    }

    /** 
     * Test pencarian destinasi berdasarkan keyword
     */
    public function testSearchDestinationByKeyword()
    {
        // Melakukan request pencarian dengan keyword 'Pantai'
        $response = $this->getJson('/api/destination/search/Pantai');

        // Assertions
        $response->assertStatus(200)
            ->assertJsonCount(2, 'data')  // Harusnya 2 destinasi
            ->assertJsonFragment(['name' => 'Pantai Kuta'])
            ->assertJsonFragment(['name' => 'Pantai Pandawa']);
    }

    /** 
     * Test filter destinasi berdasarkan kategori
     */
    public function testFilterDestinationByCategory()
    {
        // Ambil ID kategori Beach
        $beachCategory = Category::where('name', 'Beach')->first();

        // Melakukan request filter berdasarkan kategori
        $response = $this->getJson("/api/destinations?category={$beachCategory->id}");

        // Assertions
        $response->assertStatus(200)
            ->assertJsonCount(2, 'data')  // Harusnya 2 destinasi pantai
            ->assertJsonFragment(['name' => 'Pantai Kuta'])
            ->assertJsonFragment(['name' => 'Pantai Pandawa'])
            ->assertJsonMissing(['name' => 'Bromo Mountain']);
    }

    /** 
     * Test filter destinasi berdasarkan region
     */
    public function testFilterDestinationByRegion()
    {
        // Ambil ID region Bali
        $baliRegion = Region::where('name', 'Bali')->first();

        // Melakukan request filter berdasarkan region
        $response = $this->getJson("/api/destinations?region={$baliRegion->id}");

        // Assertions
        $response->assertStatus(200)
            ->assertJsonCount(2, 'data')  // Harusnya 2 destinasi di Bali
            ->assertJsonFragment(['name' => 'Pantai Kuta'])
            ->assertJsonFragment(['name' => 'Pantai Pandawa'])
            ->assertJsonMissing(['name' => 'Bromo Mountain']);
    }

    /** 
     * Test kombinasi filter kategori dan region
     */
    public function testFilterDestinationByCategoryAndRegion()
    {
        // Ambil ID kategori Beach dan region Bali
        $beachCategory = Category::where('name', 'Beach')->first();
        $baliRegion = Region::where('name', 'Bali')->first();

        // Melakukan request filter kombinasi
        $response = $this->getJson("/api/destinations?category={$beachCategory->id}&region={$baliRegion->id}");

        // Assertions
        $response->assertStatus(200)
            ->assertJsonCount(2, 'data')  // Harusnya 2 destinasi pantai di Bali
            ->assertJsonFragment(['name' => 'Pantai Kuta'])
            ->assertJsonFragment(['name' => 'Pantai Pandawa'])
            ->assertJsonMissing(['name' => 'Bromo Mountain']);
    }

    /** 
     * Test pencarian dengan keyword tidak ada
     */
    public function testSearchDestinationWithNoResults()
    {
        // Melakukan request pencarian dengan keyword yang tidak ada
        $response = $this->getJson('/api/destination/search/Taman');

        // Assertions
        $response->assertStatus(200)
            ->assertJsonCount(0, 'data');  // Harusnya tidak ada hasil
    }

    /** 
     * Test handling input filter kosong
     */
    public function testFilterWithEmptyParameters()
    {
        // Melakukan request tanpa parameter filter
        $response = $this->getJson('/api/destinations');

        // Assertions
        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');  // Harusnya semua destinasi
    }
}