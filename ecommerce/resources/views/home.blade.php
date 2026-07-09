@extends('layouts.main')

@section('title', 'Home - E-Commerce Furniture')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero-wrapper position-relative overflow-hidden">
        <img src="{{ asset('images/scandinavian-interior-mockup-wall-decal-background 1.png') }}"
             alt="Home Image"
             class="hero-image w-100 d-block">

        <div class="hero-content position-absolute top-0 end-0 w-100 h-100 d-flex justify-content-end align-items-center" style="padding-right: 80px;">
            <div class="hero-box">
                <small class="text-uppercase tracking-wider fw-bold">New Arrival</small>
                <h1 class="display-4 fw-bold text-primary-custom mt-2 mb-3">
                    Discover Our <br>
                    New Collection
                </h1>
                <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
                <a href="#shop" class="btn btn-primary-custom btn-lg px-5 py-3 rounded-0 text-white fw-bold smooth-scroll">
                    BUY NOW
                </a>
            </div>
        </div>
    </section>

    <!-- Shop Section -->
    <section id="shop" class="py-5 bg-light">
        <div class="container py-4">
            <h2 class="text-center mb-5 fw-bold section-title">Our Products</h2>
            
            <div class="text-center mb-5 d-flex justify-content-center flex-wrap gap-2">
                <button class="btn btn-outline-dark filter-btn active rounded-pill px-4" data-filter="all">All</button>
                <button class="btn btn-outline-dark filter-btn rounded-pill px-4" data-filter="chair">Chair</button>
                <button class="btn btn-outline-dark filter-btn rounded-pill px-4" data-filter="sofa">Sofa</button>
                <button class="btn btn-outline-dark filter-btn rounded-pill px-4" data-filter="table">Table</button>
                <button class="btn btn-outline-dark filter-btn rounded-pill px-4" data-filter="lamp">Lamp</button>
            </div>  
            
            <!-- Products Grid loaded via AJAX -->
            <div class="row g-4" id="product-container">
                <div class="col-12 text-center py-5">
                    <div class="spinner-border text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add to Cart / Quick Shop Section -->
    <section id="quick-cart" class="py-5" style="background-color: #FCF8F3;">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card shadow-sm border-0 rounded-4 p-4 p-md-5">
                        <h3 class="text-center mb-4 fw-bold">Quick Add to Cart</h3>

                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Choose Product</label>
                                <select name="product_id" class="form-select form-select-lg rounded-3" required>
                                    <option value="" disabled selected>-- Select a product --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->nama_produk }} - Rp {{ number_format($product->harga, 0, ',', '.') }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Quantity</label>
                                <div class="input-group input-group-lg">
                                    <button class="btn btn-outline-secondary px-3 qty-btn" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                    <input type="number" name="quantity" class="form-control text-center" min="1" value="1" required>
                                    <button class="btn btn-outline-secondary px-3 qty-btn" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                </div>
                                @error('quantity')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-warning btn-lg fw-bold rounded-3">
                                    <i class="bi bi-cart-plus me-2"></i> Add to Cart
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 mt-4 mb-5">
        <div class="container py-4">
            <h2 class="text-center mb-5 fw-bold section-title">About Our Projects</h2>

            <div id="projectCarousel" class="carousel slide carousel-fade shadow-sm rounded-4 overflow-hidden" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row g-0" style="background-color: #FCF8F3;">
                            <div class="col-md-5">
                                <img src="{{ asset('images/Rectangle 24.png') }}" class="img-fluid h-100 object-fit-cover w-100" alt="Slide 1">
                            </div>
                            <div class="col-md-7 d-flex align-items-center">
                                <div class="p-5 p-lg-5">
                                    <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill">01</span>
                                    <h3 class="fw-bold mb-3">Modern Living Room</h3>
                                    <p class="text-muted lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <a href="#" class="btn btn-outline-dark rounded-pill px-4">Explore More <i class="bi bi-arrow-right ms-2"></i></a>
                                </div> 
                            </div> 
                        </div>
                    </div>    

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row g-0" style="background-color: #FCF8F3;">
                            <div class="col-md-5">
                                <img src="{{ asset('images/Rectangle 25.png') }}" class="img-fluid h-100 object-fit-cover w-100" alt="Slide 2">
                            </div>
                            <div class="col-md-7 d-flex align-items-center">
                                <div class="p-5 p-lg-5">
                                    <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill">02</span>
                                    <h3 class="fw-bold mb-3">Cozy Workspace</h3>
                                    <p class="text-muted lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <a href="#" class="btn btn-outline-dark rounded-pill px-4">Explore More <i class="bi bi-arrow-right ms-2"></i></a>
                                </div> 
                            </div> 
                        </div>
                    </div>
            
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row g-0" style="background-color: #FCF8F3;">
                            <div class="col-md-5">
                                <img src="{{ asset('images/Rectangle 40.png') }}" class="img-fluid h-100 object-fit-cover w-100" alt="Slide 3">
                            </div>
                            <div class="col-md-7 d-flex align-items-center">
                                <div class="p-5 p-lg-5">
                                    <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill">03</span>
                                    <h3 class="fw-bold mb-3">Minimalist Bedroom</h3>
                                    <p class="text-muted lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <a href="#" class="btn btn-outline-dark rounded-pill px-4">Explore More <i class="bi bi-arrow-right ms-2"></i></a>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon rounded-circle bg-dark p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon rounded-circle bg-dark p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-white mb-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold section-title">Get In Touch With Us</h2>
                <p class="text-muted mt-3 max-w-2xl mx-auto">For More Information About Our Product & Services. Please Feel Free To Drop Us An Email. Our Staff Always Be There To Help You Out. Do Not Hesitate!</p>
            </div>
            
            <div class="row justify-content-center g-5">
                <!-- Contact Info -->
                <div class="col-md-4">
                    <div class="d-flex mb-4">
                        <div class="contact-icon me-3">
                            <i class="bi bi-geo-alt-fill fs-3 text-warning"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Address</h5>
                            <p class="text-muted mb-0">236 5th SE Avenue, New York NY10000, United States</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="contact-icon me-3">
                            <i class="bi bi-telephone-fill fs-3 text-warning"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Phone</h5>
                            <p class="text-muted mb-0">Mobile: +(84) 546-6789<br>Hotline: +(84) 456-6789</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="contact-icon me-3">
                            <i class="bi bi-clock-fill fs-3 text-warning"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Working Time</h5>
                            <p class="text-muted mb-0">Monday-Friday: 9:00 - 22:00<br>Saturday-Sunday: 9:00 - 21:00</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-md-6">
                    <form class="contact-form p-4 border rounded-4 shadow-sm bg-white">
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Your Name</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0" id="name" placeholder="Abc">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control form-control-lg bg-light border-0" id="email" placeholder="Abc@def.com">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="form-label fw-semibold">Subject</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0" id="subject" placeholder="This is an optional">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold">Message</label>
                            <textarea class="form-control bg-light border-0" id="message" rows="4" placeholder="Hi! i'd like to ask about"></textarea>
                        </div>
                        <button type="button" class="btn btn-warning btn-lg px-5 rounded-3 fw-bold text-white w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>  
@endsection
