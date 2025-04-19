<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\CMS\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function edit()
    {
        $config = Config::firstOrCreate([]);
        return view('cms.config.index', compact('config'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'web_name' => 'required|string|max:255',
            'nama_pt' => 'required|string|max:255',
            'favicon' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'telegram' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $config = Config::first();

        $config->update([
            'web_name' => $request->web_name,
            'nama_pt' => $request->nama_pt,
            'favicon' => $request->favicon,
            'logo' => $request->logo,
            'meta_description' => $request->meta_description,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'whatsapp' => $request->whatsapp,
            'telegram' => $request->telegram,
            'alamat' => $request->alamat
        ]);

        $config->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
