<?php
include 'conf.php'; // Include database connection

// Check if a product ID is passed in the URL
if (isset($_GET['ID']) && !empty($_GET['ID'])) {
    $productId = intval($_GET['ID']); // Sanitize input to prevent SQL injection

    // Validate that the product ID is a positive integer
    if ($productId <= 0) {
        echo "<p>Invalid product ID.</p>";
        exit();
    }

    // Using a prepared statement to fetch product details securely
    $stmt = mysqli_prepare($conn, "SELECT * FROM product WHERE ID = ?");
    mysqli_stmt_bind_param($stmt, "i", $productId); // "i" for integer
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result); // Fetch the product details
    } else {
        echo "<p>Product not found.</p>";
        exit();
    }
} else {
    echo "<p>No product ID provided. Please provide a valid product ID in the URL.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['Name']); ?> - Product Details</title>
    <link rel="stylesheet" href="productdetails.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="product-container">
        <!-- Product Image -->
        <img src="<?php echo htmlspecialchars($product['Image']); ?>" alt="<?php echo htmlspecialchars($product['Name']); ?>">

        <!-- Product Name -->
        <h1><?php echo htmlspecialchars($product['Name']); ?></h1>

        <!-- Product Price -->
        <p class="price">Price: Rs. <?php echo number_format($product['Price'], 2); ?></p>

        <!-- Buttons -->
        <a href="productmanage.php" class="back-btn">Back to Products</a>
        <a href="#" class="cart-btn">Add to Cart</a>
    </div>
</body>
</html>
