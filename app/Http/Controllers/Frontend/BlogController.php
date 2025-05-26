<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CMS\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'publish')->orderBy('id', 'desc')->paginate(3);

        return view('frontend.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $posts = Post::where('status', 'publish')->orderBy('id', 'desc')->paginate(5);
        $post = Post::where('status', 'publish')->where('slug', $slug)->firstOrFail();

        return view('frontend.blog.show', compact('post', 'posts'));
    }
}
