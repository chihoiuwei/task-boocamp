<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display products page with Blade view.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Return products as JSON for AJAX filtering.
     */
    public function getProducts()
    {
        $products = Product::all()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->nama_produk,
                'price' => 'Rp ' . number_format($product->harga, 0, ',', '.'),
                'category' => strtolower($product->kategori),
                'image' => asset('images/' . $product->image),
            ];
        });

        return response()->json($products);
    }
}
