<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller{
    public function index()
    {
        return "Daftar Cart";
    }

    public function checkout()
    {
        return "Halaman Checkout";
    }
}
