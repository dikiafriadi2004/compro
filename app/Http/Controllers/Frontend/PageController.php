<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CMS\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        if ($slug === 'contact') {
            return redirect()->route('contact.index');
        }

        $page = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.show', compact('page'));
    }
}
