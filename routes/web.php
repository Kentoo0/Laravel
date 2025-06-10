<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::view('/upload', 'upload');
Route::post('/upload', [UploadController::class, 'store'])->name('upload.image');


Route::view('/male', 'male')->name('male');
Route::view('/female', 'female')->name('female');
Route::view('/unisex', 'unisex')->name('unisex');


Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{category}', [ProductController::class, 'showCategory'])->name('category.show');


Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'is_admin']);


require __DIR__.'/auth.php';
