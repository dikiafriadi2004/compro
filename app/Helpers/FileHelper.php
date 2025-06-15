<?php

namespace App\Helpers;

class FileHelper
{
    // Fungsi untuk sinkronisasi antara konten lama dan baru
    public static function syncEditorImages(string $oldContent = '', string $newContent = '')
    {
        $uploadFolder = '/' . trim(env('CUSTOM_UPLOAD_LOCATION', 'upload'), '/');

        preg_match_all('/<img[^>]+src="([^">]+)"/', $oldContent, $oldMatches);
        preg_match_all('/<img[^>]+src="([^">]+)"/', $newContent, $newMatches);

        $oldImages = $oldMatches[1] ?? [];
        $newImages = $newMatches[1] ?? [];

        $deletedImages = array_diff($oldImages, $newImages);

        foreach ($deletedImages as $url) {
            $path = parse_url($url, PHP_URL_PATH);
            $file = public_path($path);

            if (str_contains($path, $uploadFolder) && file_exists($file)) {
                @unlink($file);
            }
        }
    }

    // 🆕 Fungsi tambahan untuk menghapus semua gambar dalam konten
    public static function deleteImagesFromContent(string $content)
    {
        $uploadFolder = '/' . trim(env('CUSTOM_UPLOAD_LOCATION', 'upload'), '/');

        preg_match_all('/<img[^>]+src="([^">]+)"/', $content, $matches);
        $images = $matches[1] ?? [];

        foreach ($images as $url) {
            $path = parse_url($url, PHP_URL_PATH);
            $file = public_path($path);

            if (str_contains($path, $uploadFolder) && file_exists($file)) {
                @unlink($file);
            }
        }
    }
}