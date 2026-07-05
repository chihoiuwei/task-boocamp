<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display cart page.
     */
    public function index()
    {
        $orders = Order::with('product')->latest()->get();
        $products = Product::all();
        return view('cart.index', compact('orders', 'products'));
    }

    /**
     * Store a new order (add to cart).
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Order::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Remove an order from cart.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    /**
     * Display checkout page.
     */
    public function checkout()
    {
        $orders = Order::with('product')->get();
        $total = $orders->sum(function ($order) {
            return $order->product->harga * $order->quantity;
        });

        return view('cart.checkout', compact('orders', 'total'));
    }
}
