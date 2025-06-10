<?php

namespace App\Http\Controllers;
use Midtrans\Snap;
use Midtrans\Transaction;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
{
    $params = [
        'transaction_details' => [
            'order_id' => uniqid(),
            'gross_amount' => $request->total
        ],
        'customer_details' => [
            'first_name' => $request->name,
            'email' => $request->email,
        ]
    ];

    $snapToken = Snap::getSnapToken($params);

    return view('checkout', compact('snapToken'));
}
}
