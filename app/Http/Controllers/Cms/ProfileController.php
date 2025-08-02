<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('cms.profile.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'           => 'required|string|max:255',
            'username'       => 'required|string|max:255|unique:users,username,' . $user->id,
            'email'          => 'required|email|max:255|unique:users,email,' . $user->id,
            'password'       => 'nullable|string|min:6|confirmed',
            'profile_photo'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;

        // Upload Foto Profil
        if ($request->hasFile('profile_photo')) {
            $profilePath = public_path(env('CUSTOM_UPLOAD_PROFILE_LOCATION', 'uploads/profile-photos'));

            // Buat folder jika belum ada
            if (!File::isDirectory($profilePath)) {
                File::makeDirectory($profilePath, 0755, true);
            }

            // Hapus foto lama jika ada
            if ($user->profile_photo && file_exists($profilePath . '/' . $user->profile_photo)) {
                unlink($profilePath . '/' . $user->profile_photo);
            }

            // Simpan foto baru
            $image = $request->file('profile_photo');
            $image_name = time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());
            $image->move($profilePath, $image_name);

            $user->profile_photo = $image_name;
        }

        // Update password jika ada
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
