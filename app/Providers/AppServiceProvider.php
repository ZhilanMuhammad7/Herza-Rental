<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Midtrans\Config;


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
        // Inisialisasi Midtrans jika class tersedia
        if (class_exists(\Midtrans\Config::class)) {
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = config('midtrans.isProduction');
            \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
            \Midtrans\Config::$is3ds = config('midtrans.is3ds');
        }

        // Gunakan Bootstrap untuk paginasi Laravel
        Paginator::useBootstrap();
    }
}
