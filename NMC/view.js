document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('searchBar');
    const searchButton = document.getElementById('searchButton');
    const clearButton = document.getElementById('clearButton');
    const productsContainer = document.getElementById('products-container');

    // Function to fetch and display products
    const fetchProducts = (query = "") => {
        fetch('get_products.php?query=${query}') // Ensure proper PHP path and query
            .then(response => response.json())
            .then(data => {
                productsContainer.innerHTML = ""; // Clear previous results
                if (data.length === 0) {
                    productsContainer.innerHTML = "<p>No products found.</p>";
                    return;
                }

                data.forEach(product => {
                    const productItem = document.createElement("div");
                    productItem.className = "product-item"; // Use consistent class
                    productItem.innerHTML = `
                        <img src="images/${product.Image}" alt="${product.Name}">
                        <h2>${product.Name}</h2>
                        <p><strong>Product ID:</strong> ${product.ID}</p>
                        <p class="price">$${product.Price}</p>
                    `;
                    productsContainer.appendChild(productItem);
                });

                // Show the Clear button if there's a search query
                if (query.trim() !== "") {
                    clearButton.style.display = "inline-block";
                }
            })
            .catch(error => {
                console.error("Error fetching product data:", error);
            });
    };

    // Fetch all products on page load
    fetchProducts();

    // Fetch products when the search button is clicked
    searchButton.addEventListener("click", () => {
        const query = searchBar.value.trim();
        fetchProducts(query);
    });

    // Clear the search bar and show all products when the clear button is clicked
    clearButton.addEventListener("click", () => {
        searchBar.value = "";
        fetchProducts();
        clearButton.style.display = "none";
    });

    // Fetch products when pressing "Enter" in the search bar
    searchBar.addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
            const query = searchBar.value.trim();
            fetchProducts(query);
        }
    });
});