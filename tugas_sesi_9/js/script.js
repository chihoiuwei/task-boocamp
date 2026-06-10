let products = [];


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
              <button class="cart-btn" onclick="document.getElementById('cart').scrollIntoView({behavior:'smooth'})">
                Add to cart
              </button>
              <div class="actions">
                <span><img src="../img/gridicons_share.png" alt="Share"> Share</span>
                <span><img src="../img/compare-svgrepo-com 1.png" alt="Compare"> Compare</span>
                <span><img src="../img/vector.png" alt="Like"> Like</span>
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

fetch("../php/getProducts.php")
  .then(response => response.json())
  .then(data => {
      products = data;
      displayProducts(products);
  })
  .catch(error => {
      console.error(error);
  });
