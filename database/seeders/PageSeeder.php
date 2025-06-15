<?php

namespace Database\Seeders;

use App\Models\CMS\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::insert([
        [
            'title' => 'Tentang Kami',
            'slug' => 'tentang-kami',
            'content' => 'Ini adalah halaman tentang kami.',
        ],
        [
            'title' => 'Kontak',
            'slug' => 'kontak',
            'content' => 'Ini adalah halaman kontak.',
        ],
    ]);
    }
}
