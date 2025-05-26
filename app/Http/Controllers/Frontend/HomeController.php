<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CMS\Post;
use App\Models\CMS\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'publish')->orderBy('id', 'desc')->paginate(3);

        // Ambil config pertama
        $config = Config::first();

        // Ambil meta data dari config
        $meta_keyword = $config->web_name ?? '';
        $meta_description = $config->meta_description ?? '';

        return view('frontend.home.index', compact('posts', 'meta_keyword', 'meta_description'));
    }
}
