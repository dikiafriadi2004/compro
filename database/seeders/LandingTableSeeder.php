<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LandingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('landings')->insert([
            [
                'title' => 'Konter Digital, Solusi Segala Kebutuhan Usaha ',
                'description' => 'Konter Digital adalah solusi segala kebutuhan Perjalanan usaha Mitra dalam membuka Peluang baru ',
                'cta' => 'http://x.com',
            ]
        ]);
    }
}
