function initApp() {
    console.log("ecommerce.js loaded");
    // ---- Navbar Scroll Effect ----
    const navbar = document.getElementById("mainNavbar");
    if (navbar) {
        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.add("shadow");
                navbar.classList.remove("shadow-sm");
            } else {
                navbar.classList.add("shadow-sm");
                navbar.classList.remove("shadow");
            }
        });
    }

    // ---- Auto-hide Flash Messages ----
    const flashAlert = document.getElementById("flashAlert");
    if (flashAlert) {
        setTimeout(function () {
            const bsAlert = new bootstrap.Alert(flashAlert);
            bsAlert.close();
        }, 5000);
    }

    // ---- Smooth Scrolling for Anchors ----
    document.querySelectorAll('a.smooth-scroll').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // ---- Product Filtering via AJAX (for Home Page) ----
    const productContainer = document.getElementById("product-container");
    const filterButtons = document.querySelectorAll(".filter-btn");

    if (productContainer) {
        let allProducts = [];

        // Fetch products on page load
        fetch('/api/products')
            .then(response => response.json())
            .then(data => {
                allProducts = data;
                displayProducts(allProducts);
            })
            .catch(error => {
                console.error('Error fetching products:', error);
                productContainer.innerHTML = '<div class="col-12 text-center text-danger">Failed to load products.</div>';
            });

        // Filter button click event
        filterButtons.forEach(button => {
            button.addEventListener("click", () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove("active"));
                // Add active class to clicked button
                button.classList.add("active");

                const filter = button.dataset.filter;
                
                if (filter === "all") {
                    displayProducts(allProducts);
                } else {
                    const filteredProducts = allProducts.filter(product => {
                        return product.category === filter;
                    });
                    displayProducts(filteredProducts);
                }
            });
        });

        // Function to render products
        function displayProducts(productArray) {
            productContainer.innerHTML = "";
            
            if (productArray.length === 0) {
                productContainer.innerHTML = '<div class="col-12 text-center py-5"><h4 class="text-muted">No products found in this category.</h4></div>';
                return;
            }

            productArray.forEach(product => {
                const html = `
                    <div class="col-md-3 col-sm-6 product-item">
                        <div class="card product-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <div class="product-images position-relative">
                                <img src="${product.image}" class="card-img-top object-fit-cover" style="height: 250px;" alt="${product.name}">
                                
                                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center bg-dark bg-opacity-50">
                                    <form action="/cart" method="POST" class="mb-3">
                                        <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''}">
                                        <input type="hidden" name="product_id" value="${product.id}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="button" class="btn btn-light text-warning fw-bold px-4 py-2 rounded-pill shadow-sm add-to-cart-quick" data-id="${product.id}">
                                            Add to cart
                                        </button>
                                    </form>
                                    <div class="actions d-flex gap-3 text-white">
                                        <a href="#" class="text-white text-decoration-none small"><i class="bi bi-share me-1"></i> Share</a>
                                        <a href="#" class="text-white text-decoration-none small"><i class="bi bi-arrow-left-right me-1"></i> Compare</a>
                                        <a href="#" class="text-white text-decoration-none small"><i class="bi bi-heart me-1"></i> Like</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <h5 class="card-title fw-bold mb-2">${product.name}</h5>
                                <p class="text-muted small mb-3 text-capitalize">${product.category}</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <span class="fw-bold fs-5 text-dark">${product.price}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                productContainer.innerHTML += html;
            });

            // Re-attach quick add to cart events
            attachQuickAddToCartEvents();
        }
    }

    // Function to handle quick add to cart via AJAX or submit form programmatically
    function attachQuickAddToCartEvents() {
        document.querySelectorAll('.add-to-cart-quick').forEach(button => {
            button.addEventListener('click', function(e) {
                const form = this.closest('form');
                
                // Fetch CSRF token if not present in form
                let csrfInput = form.querySelector('input[name="_token"]');
                if (!csrfInput.value) {
                    // This is a simplified fallback. In a real app, CSRF should be properly injected.
                    // Since we are using standard Laravel, we will just submit the form if token is valid
                    // For the home page AJAX rendered products, we might need a CSRF meta tag.
                    const metaCsrf = document.querySelector('meta[name="csrf-token"]');
                    if (metaCsrf) {
                        csrfInput.value = metaCsrf.getAttribute('content');
                    }
                }
                
                // As a fallback for missing CSRF in dynamically injected forms, 
                // we'll redirect to the shop page which has proper forms, 
                // or you could implement full AJAX cart adding.
                if (csrfInput.value) {
                    form.submit();
                } else {
                    // Fallback if CSRF fails in JS injected HTML (since we didn't add the meta tag)
                    window.location.href = '/products';
                }
            });
        });
    }
}

if (document.readyState === 'loading') {
    document.addEventListener("DOMContentLoaded", initApp);
} else {
    initApp();
}
