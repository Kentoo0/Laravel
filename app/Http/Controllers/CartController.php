<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Snap;
use Midtrans\Config;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name'     => $product->name,
                'price'    => (int) $product->price,
                'image'    => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        foreach ($cart as $id => &$item) {
            $item['stock'] = $products[$id]->stock ?? 0;
        }

        return view('cart.index', compact('cart'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json(['error' => 'Keranjang kosong.'], 400);
        }

        $items = [];
        $totalAmount = 0;

        foreach ($cart as $id => $item) {
            $product = Product::findOrFail($id);

            if ($product->stock < $item['quantity']) {
                return response()->json([
                    'error' => "Stok tidak mencukupi untuk {$product->name} (tersisa {$product->stock})"
                ], 400);
            }

            $product->stock -= $item['quantity'];
            $product->save();

            $items[] = [
                'id'       => $id,
                'price'    => (int) $item['price'],
                'quantity' => (int) $item['quantity'],
                'name'     => mb_strimwidth($item['name'], 0, 50, '...'),
            ];

            $totalAmount += $item['price'] * $item['quantity'];
        }

        $orderCode = 'ORDER-' . uniqid();

        try {
            $order = Order::create([
                'user_id'    => Auth::id(),
                'total'      => (int) $totalAmount,
                'status'     => 'pending',
                'order_code' => $orderCode,
            ]);

            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $id,
                    'price'      => (int) $item['price'],
                    'quantity'   => (int) $item['quantity'],
                ]);
            }

            Config::$serverKey    = env('MIDTRANS_SERVER_KEY');
            Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
            Config::$isSanitized  = true;
            Config::$is3ds        = true;

            $transaction = [
                'transaction_details' => [
                    'order_id'     => $orderCode,
                    'gross_amount' => (int) $totalAmount,
                ],
                'item_details' => $items,
                'customer_details' => [
                    'first_name'       => $request->name,
                    'email'            => $request->user()->email ?? 'guest@example.com',
                    'billing_address'  => [
                        'first_name' => $request->name,
                        'address'    => $request->address,
                    ],
                ],
            ];

            Log::info('Transaksi ke Midtrans:', $transaction);

            $snapToken = Snap::getSnapToken($transaction);
            session()->forget('cart');

            return response()->json(['snap_token' => $snapToken]);

        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal memproses pembayaran.'], 500);
        }
    }
}
