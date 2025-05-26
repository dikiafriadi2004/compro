<?php

use App\Models\CMS\Config;
use Illuminate\Support\Facades\Cache;

if (!function_exists('seo')) {
    /**
     * Mengambil nilai meta dari tabel configs
     * Contoh: seo('meta_keyword') atau seo('meta_description')
     */
    function seo($key, $default = 'Konter Digital Aplikasi Server Pulsa')
    {
        $config = Cache::rememberForever('site_config', function () {
            return Config::first();
        });

        return $config->$key ?? $default;
    }
}
