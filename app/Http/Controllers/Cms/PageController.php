<?php

namespace App\Http\Controllers\Cms;

use App\Models\CMS\Page;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('cms.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|string|max:255|unique:pages,slug,',
        ], [
            'title.required' => 'Title a field is required',
            'slug.required' => 'Slug a field is required',
            'slug.unique' => 'Slug already exists',
        ]);

        $page = [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
        ];

        Page::create($page);

        return redirect()->route('pages.index')->with('success', 'Pages has been created');
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
    public function edit(Page $page)
    {
        return view('cms.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id . ',id',
            'content' => 'required',
        ], [
            'title.required' => 'Title a field is required',
            'slug.required' => 'Slug a field is required',
            'slug.unique' => 'Slug already exists',
            'content.required' => 'Content a field is required',
        ]);

        // Bersihkan dan normalisasi content CKEditor
        $newContent = preg_replace('/<figure[^>]*>\s*(<img[^>]+>)\s*<\/figure>/', '$1', $request->input('content'));

        // Hapus gambar lama yang tidak lagi digunakan
        FileHelper::syncEditorImages($page->content, $newContent);

        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $newContent,
        ];

        $page->update($data);

        return redirect()->route('pages.index')->with('success', 'Page has been updated');
    }


    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('success', 'Page has been deleted.');
    }
}
