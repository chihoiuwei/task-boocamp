<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return "Home";
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/cart', [OrderController::class, 'index']);

Route::get('/checkout', [OrderController::class, 'checkout']);