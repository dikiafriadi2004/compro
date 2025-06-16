<?php

namespace App\Http\Controllers\Cms;

use App\Models\CMS\Menu;
use App\Models\CMS\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with(['parent', 'children'])
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return view('cms.menus.index', compact('menus'));
    }

    public function create()
    {
        $pages = Page::all(); // pastikan model Page diimport
        $parents = Menu::with('children')->whereNull('parent_id')->get();

        return view('cms.menus.create', compact('pages', 'parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'type'      => 'required|in:custom,home,blog,page',
            'url'       => 'nullable|string',
            'page_id'   => 'nullable|exists:pages,id',
            'parent_id' => 'nullable|exists:menus,id',
            'order'     => 'nullable|integer',
        ]);

        // Tentukan URL secara otomatis sesuai type
        switch ($validated['type']) {
            case 'home':
                $validated['url'] = '/';
                break;
            case 'blog':
                $validated['url'] = '/blog';
                break;
            case 'page':
                $validated['url'] = optional(Page::find($validated['page_id']))->slug ?? '#';
                break;
            case 'custom':
            default:
                // tetap gunakan url yang dimasukkan user
                break;
        }

        Menu::create($validated);

        cache()->forget('navbar_menus');

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        $pages = Page::all();
        $parents = Menu::whereNull('parent_id')->where('id', '!=', $menu->id)->get();

        return view('cms.menus.edit', compact('menu', 'pages', 'parents'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'type'      => 'required|in:custom,home,blog,page',
            'url'       => 'nullable|string',
            'page_id'   => 'nullable|exists:pages,id',
            'parent_id' => 'nullable|exists:menus,id',
            'order'     => 'nullable|integer',
        ]);

        // Tentukan URL berdasarkan type menu
        switch ($validated['type']) {
            case 'home':
                $validated['url'] = '/';
                break;
            case 'blog':
                $validated['url'] = '/blog';
                break;
            case 'page':
                $validated['url'] = optional(Page::find($validated['page_id']))->slug ?? '#';
                break;
            case 'custom':
            default:
                // tetap gunakan url dari form
                break;
        }

        // Update data menu
        $menu->update($validated);

        // Hapus cache navbar jika ada
        cache()->forget('navbar_menus');

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }


    public function destroy(Menu $menu)
    {
        $menu->children()->delete(); // hapus submenu-nya juga
        $menu->delete();

        cache()->forget('navbar_menus');

        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }

    /**
     * Buat URL berdasarkan tipe menu.
     */
    protected function resolveFullUrl(Menu $menu)
    {
        return match ($menu->type) {
            'home'  => '/',
            'blog'  => '/blog',
            'page'  => $menu->page?->slug ?? '/',
            'custom' => $menu->url ?? '#',
            default => '#'
        };
    }

    public function updateOrder(Request $request)
    {
        foreach ($request->menu as $item) {
            Menu::where('id', $item['id'])->update([
                'parent_id' => $item['parent_id'],
                'sort_order' => $item['sort_order'],
            ]);
        }

        cache()->forget('navbar_menus');

        return response()->json(['message' => 'Menu berhasil diurutkan']);
    }
}
