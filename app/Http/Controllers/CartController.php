<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class CartController extends Controller
{
    /**
     * Tambahkan produk ke keranjang (disimpan di session).
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'image'    => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    /**
     * Tampilkan isi keranjang dengan data stok terbaru dari database.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);

        // Ambil data produk dari database dan mapping berdasarkan ID
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        // Tambahkan informasi stok ke dalam cart
        foreach ($cart as $id => &$item) {
            if (isset($products[$id])) {
                $item['stock'] = $products[$id]->stock;
            } else {
                $item['stock'] = 0; // Produk mungkin telah dihapus dari DB
            }
        }

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
            'name'    => 'required|string|max:255',
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

            // Cek stok
            if ($product->stock < $item['quantity']) {
                return response()->json([
                    'error' => "Stok tidak mencukupi untuk {$product->name} (tersisa {$product->stock})"
                ], 400);
            }

            // Kurangi stok di database
            $product->stock -= $item['quantity'];
            $product->save();

            // Siapkan data untuk Midtrans
            $items[] = [
                'id'       => $id,
                'price'    => $item['price'],
                'quantity' => $item['quantity'],
                'name'     => $item['name'],
            ];

            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Konfigurasi Midtrans
        Config::$serverKey    = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized  = true;
        Config::$is3ds        = true;

        // Detail transaksi
        $transactionDetails = [
            'order_id'     => 'ORDER-' . uniqid(),
            'gross_amount' => $totalAmount,
        ];

        $customerDetails = [
            'first_name' => $request->name,
            'address'    => $request->address,
        ];

        $transaction = [
            'transaction_details' => $transactionDetails,
            'item_details'        => $items,
            'customer_details'    => $customerDetails,
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