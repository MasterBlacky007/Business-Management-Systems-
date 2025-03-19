// DOM Elements for Product Management
const productForm = document.getElementById('productForm');
const productTableBody = document.querySelector('#productTable tbody');
const searchBar = document.getElementById('searchBar'); // Search bar for products
const searchButton = document.getElementById('searchButton'); // Search button for products
const clearButton = document.getElementById('clearButton'); // Clear button for products

let products = [];

// Add Product
productForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('productName').value;
    const price = document.getElementById('productPrice').value;
    const image = document.getElementById('productImage').value; // image file path

    if (name && price && image) {
        products.push({ name, price, image });
        renderProducts();
        productForm.reset();
    }
});

// Render Products in Table
function renderProducts() {
    productTableBody.innerHTML = '';
    products.forEach((product, index) => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td><img src="${product.image}" alt="${product.name}" width="100" height="100"></td>
            <td>${product.name}</td>
            <td>${product.price}</td>
            <td>
                <button class="action-btn edit" onclick="editProduct(${index})">Edit</button>
                <button class="action-btn delete" onclick="deleteProduct(${index})">Delete</button>
            </td>
        `;

        productTableBody.appendChild(row);
    });
}

// Edit Product
function editProduct(index) {
    const newName = prompt('Enter new product name:', products[index].name);
    const newPrice = prompt('Enter new product price:', products[index].price);
    const newImage = prompt('Enter new product image path:', products[index].image);

    if (newName && newPrice && newImage) {
        products[index] = { name: newName, price: newPrice, image: newImage };
        renderProducts();
    }
}

// Delete Product
function deleteProduct(index) {
    if (confirm('Are you sure you want to delete this product?')) {
        products.splice(index, 1);
        renderProducts();
    }
}

// Search Products
searchButton.addEventListener("click", () => {
    const query = searchBar.value.trim().toLowerCase();
    searchProducts(query);
});

// Search functionality for products
function searchProducts(query) {
    const filteredProducts = products.filter(product => 
        product.name.toLowerCase().includes(query) ||
        product.price.toString().includes(query)
    );
    renderFilteredProducts(filteredProducts);
}

// Render filtered products
function renderFilteredProducts(filteredProducts) {
    productTableBody.innerHTML = '';
    if (filteredProducts.length === 0) {
        productTableBody.innerHTML = `<tr><td colspan="4">No products found.</td></tr>`;
    } else {
        filteredProducts.forEach((product, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><img src="${product.image}" alt="${product.name}" width="100" height="100"></td>
                <td>${product.name}</td>
                <td>${product.price}</td>
                <td>
                    <button class="action-btn edit" onclick="editProduct(${index})">Edit</button>
                    <button class="action-btn delete" onclick="deleteProduct(${index})">Delete</button>
                </td>
            `;
            productTableBody.appendChild(row);
        });
    }
}

// Clear search bar and show all products again
clearButton.addEventListener("click", () => {
    searchBar.value = ""; // Clear the search bar
    renderProducts(); // Render all products
    clearButton.style.display = "none"; // Hide the Clear button
});

// Fetch products when pressing "Enter" in the search bar
searchBar.addEventListener("keydown", (event) => {
    if (event.key === "Enter") {
        const query = searchBar.value.trim().toLowerCase();
        searchProducts(query);
    }
});
