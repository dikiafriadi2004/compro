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
            'title' => 'Privacy',
            'slug' => 'privacy',
            'content' => 'Ini adalah halaman tentang kami.',
        ],
        [
            'title' => 'Contact',
            'slug' => 'contact',
            'content' => '',
        ],
    ]);
    }
}
