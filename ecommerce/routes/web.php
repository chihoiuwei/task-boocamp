<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    $products = \App\Models\Product::all();
    return view('home', compact('products'));
})->name('home');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/api/products', [ProductController::class, 'getProducts'])->name('products.api');

// Cart
Route::get('/cart', [OrderController::class, 'index'])->name('cart.index');
Route::post('/cart', [OrderController::class, 'store'])->name('cart.store');
Route::delete('/cart/{id}', [OrderController::class, 'destroy'])->name('cart.destroy');

// Checkout
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
