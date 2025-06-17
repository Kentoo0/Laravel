<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // Middleware auth untuk semua method
        $this->middleware('auth');

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /**
     * Proses checkout dan generate Snap Token Midtrans
     */
    public function checkout(Request $request)
    {
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $request->total,
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('checkout', compact('snapToken'));
    }

    /**
     * Tampilkan halaman ringkasan transaksi
     */
    public function showTransactionSummary($orderId)
    {
        $order = Order::with('orderItems.product')->findOrFail($orderId);

        return view('transaction.summary', compact('order'));
    }
}
