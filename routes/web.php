<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    ProfileController,
    CartController,
    CheckoutController,
    ProductController,
    UploadController,
    HomeController
};

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/upload', 'upload');
Route::post('/upload', [UploadController::class, 'store'])->name('upload.image');

Route::view('/male', 'male')->name('male');
Route::view('/female', 'female')->name('female');
Route::view('/unisex', 'unisex')->name('unisex');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{category}', [ProductController::class, 'showCategory'])->name('category.show');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


/*
|--------------------------------------------------------------------------
| Routes for Authenticated Users
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    
    // Cart & Checkout
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/checkout/success', function () {
        session()->flash('success', 'Pembayaran berhasil!');
        return redirect()->route('cart.index');
    })->name('checkout.success');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Only Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Login, Register, etc.)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
