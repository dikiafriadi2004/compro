<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = [
            "Ini adalah Postingan 1",
            "Ini adalah Postingan 2",
            "Ini adalah Postingan 3"
        ];

        foreach($judul as $j)
        {
            $slug = Str::slug($j);

            Post::create([
                'title' => $j,
                'slug' => $slug, 
                'description' => 'Description' . $j,
                'content' => 'Content' . $j,
                'status' => 'publish',
                'user_id' => 1,
            ]);
        }
    }
}
