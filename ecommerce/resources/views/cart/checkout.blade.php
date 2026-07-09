@extends('layouts.main')

@section('title', 'Checkout - E-Commerce Furniture')

@section('content')
    <!-- Page Header -->
    <div class="container-fluid bg-light py-5 mb-5 border-bottom">
        <div class="container text-center py-4">
            <h1 class="display-5 fw-bold mb-3">Checkout</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cart.index') }}" class="text-decoration-none text-muted">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Checkout Content -->
    <div class="container mb-5 pb-5">
        <form action="#" method="POST">
            @csrf
            <div class="row g-5">
                <!-- Billing Details -->
                <div class="col-lg-7">
                    <h3 class="fw-bold mb-4">Billing Details</h3>
                    
                    <div class="row g-3">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">First Name</label>
                            <input type="text" class="form-control form-control-lg border-secondary-subtle" required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Last Name</label>
                            <input type="text" class="form-control form-control-lg border-secondary-subtle" required>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">Company Name (Optional)</label>
                            <input type="text" class="form-control form-control-lg border-secondary-subtle">
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">Country / Region</label>
                            <select class="form-select form-select-lg border-secondary-subtle" required>
                                <option value="ID" selected>Indonesia</option>
                                <option value="US">United States</option>
                                <option value="UK">United Kingdom</option>
                            </select>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">Street Address</label>
                            <input type="text" class="form-control form-control-lg border-secondary-subtle mb-2" placeholder="House number and street name" required>
                            <input type="text" class="form-control form-control-lg border-secondary-subtle" placeholder="Apartment, suite, unit, etc. (optional)">
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">Town / City</label>
                            <input type="text" class="form-control form-control-lg border-secondary-subtle" required>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">Province</label>
                            <select class="form-select form-select-lg border-secondary-subtle" required>
                                <option value="" disabled selected>Select province</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">ZIP Code</label>
                            <input type="text" class="form-control form-control-lg border-secondary-subtle" required>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="tel" class="form-control form-control-lg border-secondary-subtle" required>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control form-control-lg border-secondary-subtle" required>
                        </div>
                        
                        <div class="col-12 mt-4">
                            <label class="form-label fw-semibold">Additional Information</label>
                            <textarea class="form-control border-secondary-subtle" rows="4" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-xl-5">
                        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                            <h4 class="fw-bold mb-0">Product</h4>
                            <h4 class="fw-bold mb-0">Subtotal</h4>
                        </div>
                        
                        <!-- Order Items -->
                        @foreach($orders as $order)
                            <div class="d-flex justify-content-between mb-3 align-items-center">
                                <div class="text-muted">
                                    <span class="text-dark">{{ $order->product->nama_produk }}</span> x {{ $order->quantity }}
                                </div>
                                <div>
                                    Rp {{ number_format($order->product->harga * $order->quantity, 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="d-flex justify-content-between mt-4 mb-3 align-items-center pt-3 border-top">
                            <span class="text-dark">Subtotal</span>
                            <span class="text-muted">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-4 align-items-center border-bottom pb-4">
                            <span class="text-dark">Total</span>
                            <span class="fw-bold fs-4 text-warning">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        
                        <!-- Payment Methods -->
                        <div class="mb-4">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="bankTransfer" checked>
                                <label class="form-check-label fw-bold" for="bankTransfer">
                                    Direct Bank Transfer
                                </label>
                                <p class="text-muted small mt-2 mb-0 ps-4">
                                    Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                </p>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="cashOnDelivery">
                                <label class="form-check-label text-muted" for="cashOnDelivery">
                                    Cash On Delivery
                                </label>
                            </div>
                        </div>
                        
                        <p class="text-muted small mb-4">
                            Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#" class="text-dark fw-semibold">privacy policy</a>.
                        </p>
                        
                        <button type="submit" class="btn btn-outline-dark btn-lg w-100 rounded-pill fw-bold py-3" {{ $orders->count() == 0 ? 'disabled' : '' }}>
                            Place order
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
