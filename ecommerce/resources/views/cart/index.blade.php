@extends('layouts.main')

@section('title', 'Cart - E-Commerce Furniture')

@section('content')
    <!-- Page Header -->
    <div class="container-fluid bg-light py-5 mb-5 border-bottom">
        <div class="container text-center py-4">
            <h1 class="display-5 fw-bold mb-3">Shopping Cart</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Cart Content -->
    <div class="container mb-5 pb-5">
        <div class="row g-5">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="row align-items-center fw-bold text-dark">
                            <div class="col-5">Product</div>
                            <div class="col-2 text-center">Price</div>
                            <div class="col-2 text-center">Quantity</div>
                            <div class="col-2 text-center">Subtotal</div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if($orders->count() > 0)
                            @foreach($orders as $order)
                                <div class="row align-items-center p-3 border-bottom {{ $loop->last ? 'border-0' : '' }}">
                                    <!-- Product Info -->
                                    <div class="col-5 d-flex align-items-center">
                                        <div class="bg-light rounded-3 p-2 me-3" style="width: 80px; height: 80px;">
                                            <img src="{{ asset('images/' . $order->product->image) }}" alt="{{ $order->product->nama_produk }}" class="img-fluid object-fit-cover w-100 h-100 rounded">
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">{{ $order->product->nama_produk }}</h6>
                                            <small class="text-muted text-capitalize">{{ $order->product->kategori }}</small>
                                        </div>
                                    </div>
                                    <!-- Price -->
                                    <div class="col-2 text-center text-muted">
                                        Rp {{ number_format($order->product->harga, 0, ',', '.') }}
                                    </div>
                                    <!-- Quantity -->
                                    <div class="col-2 text-center">
                                        <div class="input-group input-group-sm">
                                            <input type="number" class="form-control text-center" value="{{ $order->quantity }}" min="1" readonly>
                                        </div>
                                    </div>
                                    <!-- Subtotal -->
                                    <div class="col-2 text-center fw-semibold text-dark">
                                        Rp {{ number_format($order->product->harga * $order->quantity, 0, ',', '.') }}
                                    </div>
                                    <!-- Action -->
                                    <div class="col-1 text-end">
                                        <form action="{{ route('cart.destroy', $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Are you sure you want to remove this item?');">
                                                <i class="bi bi-trash fs-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-5">
                                <div class="mb-3">
                                    <i class="bi bi-cart-x fs-1 text-muted"></i>
                                </div>
                                <h4>Your cart is empty</h4>
                                <p class="text-muted mb-4">Looks like you haven't added anything to your cart yet.</p>
                                <a href="{{ route('products.index') }}" class="btn btn-warning px-4 py-2 rounded-pill fw-bold">Return to Shop</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Cart Totals -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 bg-light" style="background-color: #F9F1E7 !important;">
                    <div class="card-body p-4 p-xl-5 text-center">
                        <h4 class="fw-bold mb-4">Cart Totals</h4>
                        
                        @php
                            $subtotal = 0;
                            foreach($orders as $order) {
                                $subtotal += ($order->product->harga * $order->quantity);
                            }
                        @endphp
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Subtotal</span>
                            <span class="text-muted">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-4 align-items-center">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold fs-4 text-warning">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        
                        <a href="{{ route('checkout') }}" class="btn btn-outline-dark btn-lg w-100 rounded-pill fw-bold {{ $orders->count() == 0 ? 'disabled' : '' }}">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
