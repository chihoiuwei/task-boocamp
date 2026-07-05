@extends('layouts.app')

@section('title', 'Shop - E-Commerce Furniture')

@section('content')
    <!-- Page Header -->
    <div class="container-fluid bg-light py-5 mb-5 border-bottom">
        <div class="container text-center py-4">
            <h1 class="display-5 fw-bold mb-3">Shop Our Collection</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Shop Content -->
    <div class="container mb-5 pb-5">
        <div class="row g-4">
            <!-- Sidebar / Filters -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Categories</h5>
                        <ul class="list-unstyled mb-0 category-list">
                            <li class="mb-3">
                                <a href="#" class="text-decoration-none text-dark d-flex justify-content-between align-items-center active">
                                    <span>All Products</span>
                                    <span class="badge bg-light text-dark rounded-pill">{{ $products->count() }}</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="#" class="text-decoration-none text-muted d-flex justify-content-between align-items-center">
                                    <span>Chair</span>
                                    <span class="badge bg-light text-dark rounded-pill">{{ $products->where('kategori', 'chair')->count() }}</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="#" class="text-decoration-none text-muted d-flex justify-content-between align-items-center">
                                    <span>Sofa</span>
                                    <span class="badge bg-light text-dark rounded-pill">{{ $products->where('kategori', 'sofa')->count() }}</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="#" class="text-decoration-none text-muted d-flex justify-content-between align-items-center">
                                    <span>Table</span>
                                    <span class="badge bg-light text-dark rounded-pill">{{ $products->where('kategori', 'table')->count() }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration-none text-muted d-flex justify-content-between align-items-center">
                                    <span>Lamp</span>
                                    <span class="badge bg-light text-dark rounded-pill">{{ $products->where('kategori', 'lamp')->count() }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm rounded-4 bg-warning text-dark">
                    <div class="card-body p-4 text-center">
                        <h5 class="fw-bold mb-3">Special Offer</h5>
                        <p class="mb-4">Get 20% off on your first purchase with our newsletter!</p>
                        <a href="{{ route('home') }}#contact" class="btn btn-dark w-100 rounded-pill fw-bold">Sign Up Now</a>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="mb-0 text-muted">Showing 1–{{ $products->count() }} of {{ $products->count() }} results</p>
                    <select class="form-select w-auto border-0 bg-light">
                        <option value="default">Default sorting</option>
                        <option value="price_asc">Sort by price: low to high</option>
                        <option value="price_desc">Sort by price: high to low</option>
                        <option value="newest">Sort by latest</option>
                    </select>
                </div>

                <div class="row g-4">
                    @forelse($products as $product)
                        <div class="col-md-4 col-sm-6">
                            <div class="card product-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                <div class="product-images position-relative">
                                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top object-fit-cover" alt="{{ $product->nama_produk }}" style="height: 250px;">
                                    
                                    <!-- Hover Overlay -->
                                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center bg-dark bg-opacity-50">
                                        <form action="{{ route('cart.store') }}" method="POST" class="mb-3">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-light text-warning fw-bold px-4 py-2 rounded-pill shadow-sm">
                                                Add to cart
                                            </button>
                                        </form>
                                        <div class="actions d-flex gap-3 text-white">
                                            <a href="#" class="text-white text-decoration-none small"><i class="bi bi-share me-1"></i> Share</a>
                                            <a href="#" class="text-white text-decoration-none small"><i class="bi bi-arrow-left-right me-1"></i> Compare</a>
                                            <a href="#" class="text-white text-decoration-none small"><i class="bi bi-heart me-1"></i> Like</a>
                                        </div>
                                    </div>
                                    
                                    @if($loop->index < 2)
                                        <div class="position-absolute top-0 end-0 m-3">
                                            <span class="badge bg-danger rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">-30%</span>
                                        </div>
                                    @elseif($loop->index == 3)
                                        <div class="position-absolute top-0 end-0 m-3">
                                            <span class="badge bg-success rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">New</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body p-4 d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title fw-bold mb-0">{{ $product->nama_produk }}</h5>
                                    </div>
                                    <p class="text-muted small mb-3 text-capitalize">{{ $product->kategori }}</p>
                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                        <span class="fw-bold fs-5 text-dark">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-box-seam fs-1 text-muted mb-3 d-block"></i>
                            <h4>No products found</h4>
                        </div>
                    @endforelse
                </div>
                
                <!-- Pagination placeholder -->
                <div class="d-flex justify-content-center mt-5">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link border-0 mx-1 rounded-3 bg-light text-dark px-3 py-2" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link border-0 mx-1 rounded-3 bg-warning text-dark px-3 py-2" href="#">1</a></li>
                            <li class="page-item"><a class="page-link border-0 mx-1 rounded-3 bg-light text-dark px-3 py-2" href="#">2</a></li>
                            <li class="page-item"><a class="page-link border-0 mx-1 rounded-3 bg-light text-dark px-3 py-2" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link border-0 mx-1 rounded-3 bg-light text-dark px-3 py-2" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
