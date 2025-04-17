<?php

namespace App\Http\Controllers\Cms;

use App\Models\CMS\Post;
use Illuminate\Support\Str;
use App\Models\CMS\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->search;

        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category_name')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('posts.title', 'like', '%' . $search . '%')
                        ->orWhere('categories.name', 'like', '%' . $search . '%')
                        ->orWhere('posts.description', 'like', '%' . $search . '%');
                });
            })->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('cms.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderByDesc('id')->get();
        return view('cms.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'image|mimes:png,jpg,jpeg|max:2024'
        ],[
            'title.required' => 'Title a field is required',
            'description.required' => 'Description a field is required',
            'content.required' => 'Content a field is required',
            'category_id.required' => 'Category a field is required',
            'thumbnail.image' => 'Thumbnail just a picture',
            'thumbnail.mimes' => "Extension just a JPEG, JPG, dan PNG",
            'thumbnail.max' => 'The maximum size for thumbnails is 2Mb',
        ]);

        if ($request->hasFile('thumbnail')){
            $image = $request->file('thumbnail');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'));
            $image->move($destination_path, $image_name);
        }

        $post = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'thumbnail' => isset($image_name) ? $image_name : null,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::user()->id,
        ];

        Post::create($post);

        return redirect()->route('post.index')->with('success', 'Post has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderByDesc('id')->get();
        return view('cms.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id.required' => 'Category a field is required',
            'thumbnail' => 'image|mimes:png,jpg,jpeg|max:2024'
        ],[
            'title.required' => 'Title a field is required',
            'description.required' => 'Description a field is required',
            'content.required' => 'Content a field is required',
            'category_id.required' => 'Category a field is required',
            'thumbnail.image' => 'Thumbnail just a picture',
            'thumbnail.mimes' => "Extension just a JPEG, JPG, dan PNG",
            'thumbnail.max' => 'The maximum size for thumbnails is 2Mb',
        ]);

        if ($request->hasFile('thumbnail')){

            if(isset($post->thumbnail) && file_exists(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION')). "/" . $post->thumbnail)){
                unlink(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION')). "/" . $post->thumbnail);
            }

            $image = $request->file('thumbnail');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'));
            $image->move($destination_path, $image_name);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'thumbnail' => isset($image_name) ? $image_name : $post->thumbnail,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::user()->id,
        ];

        Post::where('id', $post->id)->update($data);

        return redirect()->route('post.index')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(isset($post->thumbnail) && file_exists(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION')). "/" . $post->thumbnail)){
            unlink(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION')). "/" . $post->thumbnail);
        }

        Post::where('id', $post->id)->delete();

        return redirect()->route('post.index')->with('success', 'Post has been deleted');

    }
}
