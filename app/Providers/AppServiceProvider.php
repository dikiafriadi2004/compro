<?php

namespace App\Providers;

use App\Models\CMS\Config;
use App\Helpers\PhoneHelper;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Paginator::useBootstrapFive();

        View::composer('*', function ($view) {
            $config = Config::first();
            $view->with([
                'web_name'    => $config?->web_name ?? config('app.name'),
                'logo'    => $config?->logo ?? null,
                'favicon' => $config?->favicon ?? null,
                'nama_pt'     => $config?->nama_pt ?? 'Nama PT Default',
                'alamat'   => $config?->alamat ?? 'Alamat Default',
                'facebook'   => $config?->facebook ?? 'https://facebook.com',
                'instagram'   => $config?->instagram ?? 'https://instagram.com',
                'twitter'   => $config?->twitter ?? 'https://x.com',
                'whatsapp' => $config?->whatsapp ?? '6285856645555',
                'whatsapp_formatted' => PhoneHelper::formatNomorHp($config?->whatsapp ?? '6285856645555'),
                'telegram'   => $config?->telegram ?? 'http://telegram.com',
                'ch_telegram'   => $config?->ch_telegram ?? 'http://telegram.com',
            ]);
        });
    }
}
