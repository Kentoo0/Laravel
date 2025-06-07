<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showCategory($category)
{
    $categoryId = match ($category) {
        'male' => 1,
        'female' => 2,
        'unisex' => 3,
        default => null
    };

    if (!$categoryId) {
        abort(404, 'Kategori tidak ditemukan!');
    }

    $products = Product::where('category_id', $categoryId)->get();

    return view('product.category', [
        'category' => ucfirst($category),
        'products' => $products
    ]);
}

public function index()
{
    $maleProducts = Product::where('category_id', 1)->get();
    $femaleProducts = Product::where('category_id', 2)->get();
    $unisexProducts = Product::where('category_id', 3)->get();

    return view('product', compact('maleProducts', 'femaleProducts', 'unisexProducts'));
}
}