<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'title' => 'Gunung Bromo: Keajaiban Alam yang Memukau',
                'slug' => Str::slug('Gunung Bromo: Keajaiban Alam yang Memukau'),
                'content' => 'Gunung Bromo, yang terletak dalam kawasan Taman Nasional Bromo Tengger Semeru, adalah salah satu gunung berapi yang paling terkenal di Indonesia. Dikenal dengan pemandangan sunrise yang menakjubkan dan lautan pasir yang luas, Bromo menjadi destinasi yang wajib dikunjungi bagi para pencinta alam dan fotografi.

                    Mengapa Harus Pergi ke Gunung Bromo?

                    Pemandangan Matahari Terbit yang Spektakuler
                    Bangun pagi dan nikmati keindahan matahari terbit dari puncak Penanjakan. Suasana yang memukau akan menyambutmu saat sinar pertama menyentuh puncak Bromo.

                    Petualangan di Lautan Pasir
                    Menyusuri lautan pasir yang luas dan menikmati keindahan kawah Bromo adalah pengalaman yang tak terlupakan.

                    Budaya yang Kaya
                    Bersama dengan masyarakat Tengger yang masih mempertahankan tradisi mereka, kamu dapat belajar lebih banyak tentang budaya dan adat yang ada di sekitar Bromo.

                    Ayo, Rencanakan Petualanganmu ke Gunung Bromo!
                    Jangan lewatkan kesempatan untuk menyaksikan keindahan alam yang luar biasa ini. Beli tiket ke Gunung Bromo sekarang dengan klik tombol di bawah ini!',
                'image_url' => 'https://example.com/images/gunung-bromo.jpg',
                'destination_id' => 1, // Sesuaikan dengan ID destinasi Gunung Bromo
                'author_id' => 1, // Sesuaikan dengan ID penulis
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Air Terjun Tumpak Sewu: Pesona Alam yang Menakjubkan',
                'slug' => Str::slug('Air Terjun Tumpak Sewu: Pesona Alam yang Menakjubkan'),
                'content' => 'Air Terjun Tumpak Sewu terkenal sebagai salah satu air terjun terindah di Indonesia, dengan ketinggian sekitar 120 meter...',
                'image_url' => 'https://example.com/images/tumpak-sewu.jpg',
                'destination_id' => 2, // Sesuaikan dengan ID destinasi Tumpak Sewu
                'author_id' => 1, // Sesuaikan dengan ID penulis
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Pantai Pulau Merah: Surga Tersembunyi di Banyuwangi',
                'slug' => Str::slug('Pantai Pulau Merah: Surga Tersembunyi di Banyuwangi'),
                'content' => 'Pantai Pulau Merah terkenal dengan pasir merahnya yang unik dan ombak yang cocok untuk berselancar...',
                'image_url' => 'https://example.com/images/pantai-pulau-merah.jpg',
                'destination_id' => 3, // Sesuaikan dengan ID destinasi Pulau Merah
                'author_id' => 1, // Sesuaikan dengan ID penulis
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Candi Borobudur: Keajaiban Arsitektur Dunia',
                'slug' => Str::slug('Candi Borobudur: Keajaiban Arsitektur Dunia'),
                'content' => 'Candi Borobudur adalah candi Buddha terbesar dan terindah di dunia, dengan relief yang menceritakan ajaran Buddha...',
                'image_url' => 'https://example.com/images/candi-borobudur.jpg',
                'destination_id' => 4, // Sesuaikan dengan ID destinasi Candi Borobudur
                'author_id' => 1, // Sesuaikan dengan ID penulis
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Pantai Kuta: Keindahan Pantai yang Menggoda',
                'slug' => Str::slug('Pantai Kuta: Keindahan Pantai yang Menggoda'),
                'content' => 'Pantai Kuta di Bali terkenal dengan ombak yang cocok untuk berselancar dan suasana malam yang hidup...',
                'image_url' => 'https://example.com/images/pantai-kuta.jpg',
                'destination_id' => 5, // Sesuaikan dengan ID destinasi Pantai Kuta
                'author_id' => 1, // Sesuaikan dengan ID penulis
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Kawah Putih: Keindahan Alam yang Menakjubkan',
                'slug' => Str::slug('Kawah Putih: Keindahan Alam yang Menakjubkan'),
                'content' => 'Kawah Putih di Ciwidey adalah kawah vulkanik dengan air yang putih kehijauan dan suasana magis...',
                'image_url' => 'https://example.com/images/kawah-putih.jpg',
                'destination_id' => 6, // Sesuaikan dengan ID destinasi Kawah Putih
                'author_id' => 1, // Sesuaikan dengan ID penulis
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
