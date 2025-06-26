<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Tampilkan produk berdasarkan kategori (male, female, unisex).
     */
    public function showCategory($category)
    {
        $categoryId = match ($category) {
            'male'   => 1,
            'female' => 2,
            'unisex' => 3,
            default  => null,
        };

        if (!$categoryId) {
            abort(404, 'Kategori tidak ditemukan.');
        }

        $products = Product::where('category_id', $categoryId)->get();

        return view('product.category', [
            'category' => ucfirst($category),
            'products' => $products,
        ]);
    }

    /**
     * Halaman utama produk: tampilkan semua kategori.
     */
    public function index()
    {
        $maleProducts   = Product::where('category_id', 1)->get();
        $femaleProducts = Product::where('category_id', 2)->get();
        $unisexProducts = Product::where('category_id', 3)->get();

        return view('product', compact('maleProducts', 'femaleProducts', 'unisexProducts'));
    }

    /**
     * Detail produk berdasarkan ID.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Form tambah produk (admin).
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Simpan produk baru (admin).
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|in:1,2,3',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload gambar ke storage/public/products
        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image'       => 'storage/' . $imagePath,
        ]);

        return redirect()
            ->route('admin.product.create')
            ->with('success', 'Produk berhasil ditambahkan!');
    }
}
