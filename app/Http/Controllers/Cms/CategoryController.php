<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Support\Str;
use App\Models\CMS\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $categories = Category::where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'like', "%{$search}%");
            }
        })->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('cms.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);


        return redirect()->route('categories.index')->with('success', 'Category has been created');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('categories.index')->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::where('id', $category->id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category has been deleted');
    }
}
