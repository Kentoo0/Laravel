<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\HomeController;




Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/upload', function () {
    return view('upload');
});
Route::post('/upload', [UploadController::class, 'store'])->name('upload.image');

Route::get('/male', function () {
    return view('male');
})->name('male');

Route::get('/female', function () {
    return view('female');
})->name('female');

Route::get('/unisex', function () {
    return view('unisex');
})->name('unisex');


Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{category}', [ProductController::class, 'showCategory'])->name('category.show');


Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/', [HomeController::class, 'index'])->name('home');





