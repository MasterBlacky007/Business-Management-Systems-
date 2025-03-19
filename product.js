localStorage.setItem('products', JSON.stringify([
    { name: "Apple", price: 1.99, description: "Fresh apples", imagePath: "images.jpeg" },
    { name: "Banana", price: 0.99, description: "Ripe bananas", imagePath: "images/banana.jpg" },
    { name: "Mango", price: 0.99, description: "Sweet mangoes", imagePath: "images/mango.jpg" },
    { name: "Pear", price: 0.99, description: "Juicy pears", imagePath: "images/pear.jpg" },
    { name: "Grapes", price: 200.00, description: "Fresh grapes", imagePath: "images/grapes.jpg" },
    { name: "Pineapple", price: 0.99, description: "Tropical pineapple", imagePath: "images/pineapple.jpg" }
]));

// Function to render products dynamically on the page
function renderProducts() {
    const productContainer = document.getElementById('productContainer');
    const products = JSON.parse(localStorage.getItem('products')) || [];
    
    // Generate HTML for all products and update the container
    productContainer.innerHTML = products.map(product => `
        <div class="product">
            <img src="${product.imagePath}" alt="${product.name}"> <!-- Product image -->
            <h2>${product.name}</h2> <!-- Product name -->
            <p>${product.description}</p> <!-- Product description -->
            <p class="price">LKR${product.price.toFixed(2)}</p> <!-- Product price -->
        </div>
    `).join('');
}

// Render products as soon as the page finishes loading
document.addEventListener('DOMContentLoaded', renderProducts);