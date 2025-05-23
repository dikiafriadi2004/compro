<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CMS\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'publish')->orderBy('id', 'desc')->paginate(3);
        return view('frontend.home.index', compact('posts'));
    }
}
