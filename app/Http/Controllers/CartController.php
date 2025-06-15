<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class CartController extends Controller
{
    /**
     * Tambahkan produk ke keranjang (session).
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    /**
     * Tampilkan isi keranjang.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    /**
     * Hapus produk dari keranjang.
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    /**
     * Proses checkout dan integrasi Midtrans.
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        if (!$cart || count($cart) === 0) {
            return response()->json(['error' => 'Keranjang kosong'], 400);
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

            // Kurangi stok
            $product->stock -= $item['quantity'];
            $product->save();

            // Siapkan data untuk Midtrans
            $items[] = [
                'id' => $id,
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'name' => $item['name'],
            ];

            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Detail transaksi
        $transactionDetails = [
            'order_id' => 'ORDER-' . uniqid(),
            'gross_amount' => $totalAmount,
        ];

        $customerDetails = [
            'first_name' => $request->name,
            'address' => $request->address,
        ];

        $transaction = [
            'transaction_details' => $transactionDetails,
            'item_details' => $items,
            'customer_details' => $customerDetails,
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction);

            // Bersihkan keranjang setelah proses
            session()->forget('cart');

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal membuat Snap Token: ' . $e->getMessage()
            ], 500);
        }
    }
}
