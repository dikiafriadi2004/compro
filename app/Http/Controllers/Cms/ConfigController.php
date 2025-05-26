<?php

namespace App\Http\Controllers\Cms;

use App\Models\CMS\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ConfigController extends Controller
{
    public function edit()
    {
        $config = Config::firstOrCreate([]);
        return view('cms.config.index', compact('config'));
    }

    public function update(Request $request, Config $config)
    {
        $request->validate([
            'web_name' => 'required|string|max:255',
            'nama_pt' => 'required|string|max:255',
            'favicon' => 'image|mimes:png,jpg,jpeg|max:2024',
            'logo' => 'image|mimes:png,jpg,jpeg|max:2024',
            'meta_description' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'telegram' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ], [
            'web_name.required' => 'Name Website a field is required',
            'nama_pt.required' => 'Nama PT a field is required',
            'favicon.image' => 'Favicon just a picture',
            'favicon.mimes' => "Extension just a JPEG, JPG, dan PNG",
            'favicon.max' => 'The maximum size for favicon is 2Mb',
            'logo.image' => 'Logo just a picture',
            'logo.mimes' => "Extension just a JPEG, JPG, dan PNG",
            'logo.max' => 'The maximum size for logo is 2Mb',
            'meta_description.required' => 'Meta Description a field is required',
            'facebook.required' => 'Facebook a field is required',
            'instagram.required' => 'Instagram a field is required',
            'whatsapp.required' => 'Whatsapp a field is required',
            'telegram.required' => 'Telegram a field is required',
            'alamat.required' => 'Alamat a field is required',
        ]);

        $config = Config::first();

        if ($request->hasFile('favicon')) {

            if (isset($config->favicon) && file_exists(public_path(getenv('CUSTOM_UPLOAD_LOCATION')) . "/" . $config->favicon)) {
                unlink(public_path(getenv('CUSTOM_UPLOAD_LOCATION')) . "/" . $config->favicon);
            }

            $image = $request->file('favicon');
            $favicon_name = time() . "_" . $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_UPLOAD_LOCATION'));
            $image->move($destination_path, $favicon_name);
        }

        if ($request->hasFile('logo')) {

            if (isset($config->logo) && file_exists(public_path(getenv('CUSTOM_UPLOAD_LOCATION')) . "/" . $config->logo)) {
                unlink(public_path(getenv('CUSTOM_UPLOAD_LOCATION')) . "/" . $config->logo);
            }

            $image = $request->file('logo');
            $logo_name = time() . "_" . $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_UPLOAD_LOCATION'));
            $image->move($destination_path, $logo_name);
        }

        $config->update([
            'web_name' => $request->web_name,
            'nama_pt' => $request->nama_pt,
            'favicon' => isset($favicon_name) ? $favicon_name : $config->favicon,
            'logo' => isset($logo_name) ? $logo_name : $config->logo,
            'meta_description' => $request->meta_description,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'whatsapp' => $request->whatsapp,
            'telegram' => $request->telegram,
            'alamat' => $request->alamat
        ]);

        $config->save();

        // Perbarui cache site_config
        Cache::forget('site_config');
        Cache::rememberForever('site_config', function () {
            return Config::first();
        });

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
