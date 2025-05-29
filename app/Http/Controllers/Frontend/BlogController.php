<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CMS\Post;
use App\Models\CMS\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'publish')->orderBy('id', 'desc')->paginate(12);

        // Ambil config pertama
        $config = Config::first();

        // Ambil meta data dari config
        $meta_keyword = $config->web_name ?? '';
        $meta_description = $config->meta_description ?? '';

        return view('frontend.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $posts = Post::where('status', 'publish')->orderBy('id', 'desc')->paginate(5);
        $post = Post::where('status', 'publish')->where('slug', $slug)->firstOrFail();

        $post = DB::table('posts')->where('slug', $slug)->first();

        if ($post) {
            DB::table('posts')->where('id', $post->id)->increment('views');
        }

        // Ambil meta dari data post
        $meta_keyword = $post->meta_keyword;
        $meta_description = $post->meta_description;

        return view('frontend.blog.show', compact('post', 'posts', 'meta_keyword', 'meta_description'));
    }
}
