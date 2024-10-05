<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $regions = [
            ['name' => 'Bali', 'description' => 'Pulau Dewata yang terkenal dengan keindahan pantai dan budayanya yang kental.'],
            ['name' => 'Yogyakarta', 'description' => 'Kota budaya yang kaya akan sejarah, candi, dan tradisi Jawa.'],
            ['name' => 'Jawa Barat', 'description' => 'Provinsi dengan keindahan alam pegunungan, air terjun, dan wisata kuliner.'],
            ['name' => 'Jawa Timur', 'description' => 'Wilayah dengan gunung berapi aktif, pantai, dan wisata budaya yang kaya.'],
            ['name' => 'Sumatera Utara', 'description' => 'Provinsi dengan pesona Danau Toba dan wisata alam lainnya yang menakjubkan.'],
            ['name' => 'Nusa Tenggara Timur', 'description' => 'Provinsi yang terkenal dengan wisata eksotis seperti Taman Nasional Komodo.'],
            ['name' => 'Nusa Tenggara Barat', 'description' => 'Lombok dan Gili adalah bagian dari pesona alam NTB, dengan pantai-pantai eksotis dan Gunung Rinjani.'],
            ['name' => 'Sulawesi Selatan', 'description' => 'Tanah Toraja yang penuh misteri budaya dan Pulau Selayar yang indah.'],
            ['name' => 'Maluku', 'description' => 'Wilayah kepulauan dengan pantai-pantai terpencil, termasuk Kepulauan Banda dan Kei.'],
            ['name' => 'Papua Barat', 'description' => 'Rumah bagi Raja Ampat, salah satu tempat penyelaman terbaik di dunia.'],
            ['name' => 'Kalimantan Timur', 'description' => 'Provinsi dengan hutan hujan tropis, orangutan, dan tambang batu bara.'],
            ['name' => 'Kalimantan Tengah', 'description' => 'Provinsi dengan hutan hujan tropis, sungai besar, dan suku Dayak.'],
            ['name' => 'Kalimantan Selatan', 'description' => 'Provinsi dengan hutan rawa gambut, sungai besar, dan suku Banjar.'],
            ['name' => 'Kalimantan Utara', 'description' => 'Provinsi termuda di Indonesia dengan potensi wisata alam yang besar.'],
            ['name' => 'Aceh', 'description' => 'Provinsi yang terkenal dengan kopi Gayo, pantai, dan sejarah tsunami.'],
            ['name' => 'Riau', 'description' => 'Provinsi dengan hutan gambut, sungai besar, dan kekayaan budaya Melayu.'],
            ['name' => 'Kepulauan Riau', 'description' => 'Provinsi kepulauan dengan pesona pantai dan pulau-pulau eksotis.'],
            ['name' => 'Bengkulu', 'description' => 'Provinsi dengan pantai dan hutan hujan tropis yang masih alami.'],
            ['name' => 'Lampung', 'description' => 'Provinsi dengan pantai, hutan, dan kekayaan budaya Lampung.'],
            ['name' => 'Bangka Belitung', 'description' => 'Provinsi kepulauan dengan pantai dan batu granit yang unik.'],
            ['name' => 'Jambi', 'description' => 'Provinsi dengan hutan hujan tropis, sungai besar, dan kekayaan budaya Melayu.'],
            ['name' => 'Sumatera Barat', 'description' => 'Provinsi dengan alam pegunungan, dan kekayaan budaya Minangkabau.'],
            ['name' => 'Sumatera Selatan', 'description' => 'Provinsi dengan hutan, sungai besar, dan kekayaan budaya Palembang.'],
        ];


        foreach ($regions as $region) {
            Region::create([
                'name' => $region['name'],
                'description' => $region['description'],
            ]);
        }
    }
}
