<?php

namespace App\Http\Controllers\Cms;

use App\Models\User;
use App\Models\CMS\Post;
use App\Models\CMS\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();

        $latestPosts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category_name')
            ->orderBy('posts.id', 'desc')
            ->orderBy('posts.created_at', 'desc')
            ->limit(5)
            ->get();

        $popularPosts = DB::table('posts')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->select(
                'posts.title',
                'posts.slug',
                'posts.status',
                'posts.views',
                'categories.name as category_name',
                'categories.slug as category_slug'
            )
            ->where('posts.views', '>', 0) // Hanya yang punya views > 0
            ->orderByDesc('posts.views')
            ->limit(5)
            ->get();

        return view('cms.dashboard.index', compact(
            'totalPosts',
            'totalCategories',
            'totalUsers',
            'latestPosts',
            'popularPosts'
        ));
    }
}
