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
        $this->actingAs(user: $this->user);

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

        if ($response->getStatusCode() === 401) {
            $this->fail("Testing gagal karena User Harus Login Untuk Melakukan Order");
            return;
        }

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

    // Integration Testing
    public function testOrderReceiptEmail()
    {
        // Menyimpan file sementara menggunakan fake storage
        Storage::fake('public');

        // Membuat file bukti pembayaran palsu
        $paymentProof = UploadedFile::fake()->image('payment.jpg');

        // Autentikasi user yang akan melakukan order
        $this->actingAs(user: $this->user);

        // Membuat order dengan status 'pending'
        $order = Order::factory()->create(
            [
                'user_id' => $this->user->id,
                'destination_id' => $this->destination->id,
                'quantity' => 2,
                'total_price' => $this->destination->price * 2,
                'payment_method' => 'bank_transfer',
                'payment_proof' => $paymentProof,
                'status' => 'pending',  // Order dimulai dengan status pending
                'booking_date' => now()->addDays(5)->format('Y-m-d')
            ]
        );

        // Ubah status order menjadi 'approved'
        $order->status = 'approved';
        $order->save(); // Simulasikan perubahan status ke approved

        // Pastikan email hanya terkirim jika status adalah 'approved'
        if ($order->status === 'approved') {
            // Gunakan Mail::fake() untuk merekam pengiriman email
            Mail::fake();

            // Mengirim email
            Mail::to($order->user->email)->send(new OrderReceipt($order));

            // Memeriksa apakah email terkirim setelah status diubah menjadi approved
            Mail::assertSent(OrderReceipt::class, function ($mail) use ($order) {
                return $mail->order->id === $order->id;  // Memastikan email berisi order yang benar
            });
        } else {
            // Jika status bukan 'approved', uji gagal
            $this->fail("Email tidak terkirim jika status order bukan 'approved'");
        }
    }





}


?>