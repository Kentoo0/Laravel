<?php

use Midtrans\Config;
use Midtrans\Snap;

if (!function_exists('midtrans_config')) {
    function midtrans_config(): void
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }
}

if (!function_exists('midtrans_snap')) {
    function midtrans_snap(): Snap
    {
        midtrans_config();
        return new Snap();
    }
}
