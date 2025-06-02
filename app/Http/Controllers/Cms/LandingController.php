<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CMS\Landing;

class LandingController extends Controller
{
    public function edit()
    {
        $landing = Landing::firstOrCreate([]);
        return view('cms.landing.index', compact('landing'));
    }

    public function update(Request $request, Landing $landing)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'cta' => 'required|string|max:255'
        ], [
            'title.required' => 'Title a field is required',
            'description.required' => 'Description a field is required',
            'cta.required' => 'CTA a field is required',
        ]);

        $landing = Landing::first();

        $landing->update([
            'title' => $request->title,
            'description' => $request->description,
            'cta' => $request->cta
        ]);

        $landing->save();


        return redirect()->back()->with('success', 'Landing successfully updated!');
    }
}
