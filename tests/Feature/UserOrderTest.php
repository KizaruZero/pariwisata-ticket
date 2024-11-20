<?php
namespace Tests\Feature;

use App\Models\User;
use App\Models\Destination;
use App\Models\Order;
use App\Models\Category;
use App\Models\Region;
use App\Mail\OrderReceipt;

use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserOrderTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $destination;

    protected $region;
    protected $category;

    protected $order;

    protected function setUp(): void
    {
        parent::setUp();

        // Membuat user untuk pengujian
        $this->user = User::factory()->create(
            [
                'name' => 'John Doe',
                'email' => 'ardyapusaka@gmail.com',
                'password' => bcrypt('password')
            ]
        );
        $this->category = Category::factory()->create();
        $this->region = Region::factory()->create();

        // Membuat destination untuk pengujian
        $this->destination = Destination::factory()->create([
            'category_id' => $this->category->id,
            'region_id' => $this->region->id,
            'price' => 250000
        ]);

        // Membuat order untuk pengujian

    }



    /** @test */
    public function OrderWithDestinationModul()
    {
        // Simulasi file bukti pembayaran
        Storage::fake('public');
        $paymentProof = UploadedFile::fake()->image('payment.jpg');

        // Login sebagai user
        $this->actingAs($this->user);

        // Data input untuk order
        $data = [
            'user_id' => $this->user->id,
            'destination_id' => $this->destination->id,
            'quantity' => 2,
            'total_price' => $this->destination->price * 2,
            'payment_method' => 'bank_transfer',
            'status' => 'pending',
            'payment_proof' => $paymentProof,
            'booking_date' => now()->addDays(5)->format('Y-m-d')
        ];

        // Kirim request untuk membuat order
        $response = $this->postJson(route('order.store'), $data);

        // Pastikan respons berhasil
        $response->assertStatus(201)
            ->assertJsonStructure(['message', 'order']);

        // Periksa data order di database
        $this->assertDatabaseHas('orders', [
            'user_id' => $this->user->id,
            'destination_id' => $this->destination->id,
            'quantity' => 2,
            'total_price' => $this->destination->price * 2,
            'payment_method' => 'bank_transfer',
            'status' => 'pending'
        ]);

        // Pastikan bukti pembayaran tersimpan
        Storage::disk('public')->assertExists('payment_proofs/' . $paymentProof->hashName());
    }

    /** @test */
    public function AuthWithOrderModul()
    {
        // Simulasi file bukti pembayaran
        Storage::fake('public');
        $paymentProof = UploadedFile::fake()->image('payment.jpg');

        // Login sebagai user
        $this->assertGuest();

        // Data input untuk order
        $data = [
            'user_id' => $this->user->id,
            'destination_id' => $this->destination->id,
            'quantity' => 2,
            'total_price' => $this->destination->price * 2,
            'payment_method' => 'bank_transfer',
            'payment_proof' => $paymentProof,
            'booking_date' => now()->addDays(5)->format('Y-m-d')
        ];

        // Kirim request untuk membuat order
        $response = $this->postJson(route('order.store'), $data);

        if ($response->getStatusCode() === 401) {
            $this->fail("Testing gagal karena User Harus Login Untuk Melakukan Order");
            return;
        }

        // Check that the user is not allowed
        $response->assertStatus(401)
            ->assertJson(['message' => 'Unauthenticated.']);

        // Pastikan respons berhasil
        // $response->assertStatus(201)
        //     ->assertJsonStructure(['message', 'order']);

        // // Periksa data order di database
        // $this->assertDatabaseHas('orders', [
        //     'user_id' => $this->user->id,
        //     'destination_id' => $this->destination->id,
        //     'quantity' => 2,
        //     'total_price' => $this->destination->price * 2,
        //     'payment_method' => 'bank_transfer',
        //     'status' => 'pending'
        // ]);

        // // Pastikan bukti pembayaran tersimpan
        // Storage::disk('public')->assertExists('payment_proofs/' . $paymentProof->hashName());
    }

    /** @test */
    public function it_sends_email_when_order_is_approved()
    {
        // Fake email untuk mencegah pengiriman asli
        Mail::fake();
        $this->order = Order::factory()->create([
            'user_id' => $this->user->id,
            'destination_id' => $this->destination->id,
            'quantity' => 2,
            'total_price' => $this->destination->price * 2,
            'payment_method' => 'bank_transfer',
            'status' => 'approved'
        ]);

        // Approve order
        $response = $this->actingAs($this->user)
            ->postJson(route('order.approve', $this->order)); // Sesuaikan dengan route Anda

        // Assert bahwa order diubah menjadi 'approved'
        $this->order->refresh();
        $this->assertEquals('approved', $this->order->status);

        // Assert email dikirim
        Mail::assertSent(OrderReceipt::class, function ($mail) {
            return $mail->hasTo($this->user->email) && $mail->order->id === $this->order->id;
        });

        // Assert respon HTTP sukses
        $response->assertStatus(200)
            ->assertSessionHas('success', 'Order approved successfully!');
    }

}


?>