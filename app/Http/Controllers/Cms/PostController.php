<?php

namespace App\Http\Controllers\Cms;

use App\Models\CMS\Post;
use Illuminate\Support\Str;
use App\Models\CMS\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\FileHelper;

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
            ->when(!$user->getRoleNames()->contains('Super Admin'), function ($query) use ($user) {
                // Filter hanya postingan milik user jika bukan Super Admin
                $query->where('posts.user_id', $user->id);
            })
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('posts.title', 'like', '%' . $search . '%')
                        ->orWhere('categories.name', 'like', '%' . $search . '%')
                        ->orWhere('posts.description', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('posts.id', 'desc')
            ->paginate(10)
            ->withQueryString();

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
            'slug' => 'required|string|max:255|unique:posts,slug,',
            'meta_description' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:2024'
        ], [
            'title.required' => 'Title a field is required',
            'slug.required' => 'Slug a field is required',
            'slug.unique' => 'Slug already exists',
            'meta_description.required' => 'Description a field is required',
            'meta_keyword.required' => 'Meta Keyword a field is required',
            'content.required' => 'Content a field is required',
            'category_id.required' => 'Category a field is required',
            'thumbnail.required' => 'Thumbnail a field is required',
            'thumbnail.image' => 'Thumbnail just a picture',
            'thumbnail.mimes' => "Extension just a JPEG, JPG, dan PNG",
            'thumbnail.max' => 'The maximum size for thumbnails is 2Mb',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'));
            $image->move($destination_path, $image_name);
        }

        $post = [
            'title' => $request->title,
            'slug' => $request->slug,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'content' => $request->content,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'thumbnail' => isset($image_name) ? $image_name : null,
            'user_id' => Auth::user()->id,
        ];

        Post::create($post);

        return redirect()->route('post.index')->with('success', 'Post has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
{
    $post = Post::where('slug', $slug)
        ->where('status', 'publish')
        ->with('category', 'user')
        ->firstOrFail();

    return view('frontend.blog.show', compact('post'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $user = Auth::user();

        // Cek akses: jika bukan Super Admin, pastikan hanya edit milik sendiri
        if (!$user->getRoleNames()->contains('Super Admin') && $post->user_id !== $user->id) {
            return redirect()->route('post.index')->with('error', 'Anda tidak memiliki akses untuk mengedit postingan ini.');
        }

        $categories = Category::orderByDesc('id')->get();
        return view('cms.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'content' => 'required',
            'category_id.required' => 'Category a field is required',
            'thumbnail' => 'image|mimes:png,jpg,jpeg|max:2024'
        ], [
            'title.required' => 'Title a field is required',
            'slug.required' => 'Slug a field is required',
            'slug.unique' => 'Slug already exists',
            'meta_description.required' => 'Description a field is required',
            'meta_keyword.required' => 'Meta Keyword a field is required',
            'content.required' => 'Content a field is required',
            'category_id.required' => 'Category a field is required',
            'thumbnail.image' => 'Thumbnail just a picture',
            'thumbnail.mimes' => "Extension just a JPEG, JPG, dan PNG",
            'thumbnail.max' => 'The maximum size for thumbnails is 2Mb',
        ]);

        // Handle Thumbnail Upload
        if ($request->hasFile('thumbnail')) {
            $thumbPath = public_path(env('CUSTOM_THUMBNAIL_LOCATION'));

            if (isset($post->thumbnail) && file_exists($thumbPath . "/" . $post->thumbnail)) {
                unlink($thumbPath . "/" . $post->thumbnail);
            }

            $image = $request->file('thumbnail');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move($thumbPath, $image_name);
        }

        // Bersihkan dan normalisasi content CKEditor
        $newContent = preg_replace('/<figure[^>]*>\s*(<img[^>]+>)\s*<\/figure>/', '$1', $request->input('content'));

        // Hapus gambar lama yang tidak lagi digunakan
        FileHelper::syncEditorImages($post->content, $newContent);

        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'content' => $newContent,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'thumbnail' => isset($image_name) ? $image_name : $post->thumbnail,
            'user_id' => Auth::user()->id,
        ];

        $post->update($data);

        return redirect()->route('post.index')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Hapus thumbnail
        $thumbPath = public_path(env('CUSTOM_THUMBNAIL_LOCATION'));
        if ($post->thumbnail && file_exists($thumbPath . '/' . $post->thumbnail)) {
            unlink($thumbPath . '/' . $post->thumbnail);
        }

        // Hapus gambar dari konten editor
        FileHelper::deleteImagesFromContent($post->content);

        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post has been deleted');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file     = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();

            $folder   = env('CUSTOM_UPLOAD_LOCATION', 'upload');
            $path     = public_path($folder);

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);

            $url = asset($folder . '/' . $filename);

            return response()->json([
                'uploaded' => 1,
                'fileName' => $filename,
                'url' => $url
            ]);
        }

        return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file uploaded.']]);
    }

    // private function generateUniqueSlug($title)
    // {
    //     $slug = Str::slug($title);
    //     $originalSlug = $slug;
    //     $count = 1;

    //     while (Post::where('slug', $slug)->exists()) {
    //         $slug = $originalSlug . '-' . $count;
    //         $count++;
    //     }

    //     return $slug;
    // }
}
