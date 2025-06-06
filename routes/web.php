<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;




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

// Ini sudah benar, ga usah double!
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{category}', [ProductController::class, 'showCategory'])->name('category.show');

