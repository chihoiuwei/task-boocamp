<!-- Footer -->
<footer class="footer-section">
    <div class="container">
        <div class="row g-4 py-5">
            <div class="col-lg-4 col-md-6">
                <img src="{{ asset('images/Frame 168.png') }}" alt="Logo" class="mb-3" style="width: 130px;">
                <p class="text-muted mt-2">
                    Temukan furniture berkualitas premium untuk rumah impian Anda.
                    Desain modern dengan kenyamanan terbaik.
                </p>
                <div class="social-links mt-3">
                    <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-title">Links</h6>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products.index') }}">Shop</a></li>
                    <li><a href="{{ route('home') }}#about">About</a></li>
                    <li><a href="{{ route('home') }}#contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Help</h6>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">Payment Options</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Privacy Policies</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Newsletter</h6>
                <p class="text-muted small">Subscribe untuk mendapatkan info terbaru.</p>
                <div class="input-group">
                    <input type="email" class="form-control newsletter-input" placeholder="Email Anda...">
                    <button class="btn btn-subscribe" type="button">Subscribe</button>
                </div>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="text-center py-3">
            <p class="mb-0 text-muted small">&copy; {{ date('Y') }} E-Commerce Furniture. All rights reserved.</p>
        </div>
    </div>
</footer>
