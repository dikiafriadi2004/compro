<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configs')->insert([
            [
                'web_name' => 'Konter Digital',
                'nama_pt' => 'PT. Media Usaha Digital Kreatif',
                'favicon' => 'image.jpg',
                'logo' => 'image.jpg',
                'meta_description' => 'Konter Digital Adalah Aplikasi Penjualan Pulsa, Paket Data, E Money dan masih banyak lagi',
                'facebook' => 'https://facebook.com',
                'instagram' => 'https://instagram.com',
                'twitter' => 'http://x.com',
                'whatsapp' => 'http://whatsapp.com',
                'telegram' => 'http://telegram.com',
                'alamat' => 'Jl. KR. Kalok III, No. 363, Desa Lambhue, Kec. Darul Imarah, Aceh Besar',
            ]
        ]);
    }
}
