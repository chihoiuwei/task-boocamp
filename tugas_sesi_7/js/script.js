
const filterButtons = document.querySelectorAll(".filter-btn"); 
filterButtons.forEach(button => { button.addEventListener("click", () => { const filter = button.dataset.filter; 
    if (filter === "all") { 
        displayProducts(products); 
    } else { 
         const filteredProducts = products.filter(product => { 
            return product.category === filter; }
        ); 
        displayProducts(filteredProducts); 
    } 
    }); 
});



    const products = [
  {
    name: "Product 1",
    price: "$19.99",
    category: "chair",
    image: "../img/Images.png"
  },
  {
    name: "Product 2",
    price: "$29.99",
    category: "chair",
    image: "../img/Images (1).png"
  },
  {
    name: "Product 3",
    price: "$39.99",
    category: "sofa",
    image: "../img/Images (2).png"
  },
  {
    name: "Product 4",
    price: "$49.99",
    category: "table",
    image: "../img/Images (3).png"
  },
  {
    name: "Product 5",
    price: "$59.99",
    category: "lamp",
    image: "../img/produk-1.png"
  },
  {
    name: "Product 6",
    price: "$69.99",
    category: "sofa",
    image: "../img/produk-2.png"
  },
  {
    name: "Product 7",
    price: "$79.99",
    category: "sofa",
    image: "../img/produk-3.png"
  },
  {
    name: "Product 8",
    price: "$89.99",
    category: "sofa",
    image: "../img/produk-4.png"
  } 
];

const container = document.getElementById("product-container");
function displayProducts(productArray) {
  container.innerHTML = "";
  productArray.forEach(product => {
    container.innerHTML += `
      <div class="col-md-3 product-item"
        data-category="${product.category}">
        <div class="card product-card h-100">
          <div class="product-images">
            <img src="${product.image}"
              class="card-img-top">
            <div class="overlay">
              <button class="cart-btn">
                Add to cart
              </button>
              <div class="actions">
                <span>Share</span>
                <span>Compare</span>
                <span>Like</span>
              </div>
            </div>
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">
              ${product.name}
            </h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet.
            </p>
            <div class="mt-auto">
              <span class="text-muted">
                ${product.price}
              </span>
            </div>
          </div>
        </div>
      </div>
    `;
  });

}
displayProducts(products);