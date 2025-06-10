<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        $midtransHelper = app_path('helpers/midtrans.php');
        if (file_exists($midtransHelper)) {
            require_once $midtransHelper;
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }
}
