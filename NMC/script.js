const productForm = document.getElementById('productForm');
const productTableBody = document.querySelector('#productTable tbody');
const imageInput = document.getElementById('productImage');

let products = [];

// Add Product
productForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('productName').value;
    const price = document.getElementById('productPrice').value;
    const imageFile = imageInput.files[0];

    if (name && price && imageFile) {
        const reader = new FileReader();
        reader.onload = function (event) {
            const imageSrc = event.target.result; // Base64 encoded image
            products.push({ name, price, image: imageSrc });
            renderProducts();
            productForm.reset();
        };
        reader.readAsDataURL(imageFile); // Read the file as Base64
    }
});

// Render Products in Table
function renderProducts() {
    productTableBody.innerHTML = '';
    products.forEach((product, index) => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td><img src="${product.image}" alt="${product.name}" width="100"></td>
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

    if (newName && newPrice) {
        products[index].name = newName;
        products[index].price = newPrice;
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
