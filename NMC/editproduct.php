<?php
include 'conf.php';

// Get the product ID from the URL
$id = $_GET['id'];

// Fetch product details from the database
$query = "SELECT * FROM product WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error fetching product: " . mysqli_error($conn);
    exit();
}

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <h1>Edit Product</h1>
    <form action="updateproduct.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $product['ID']; ?>">
        <input type="text" name="Name" value="<?php echo $product['Name']; ?>" required>
        <input type="number" name="Price" value="<?php echo $product['Price']; ?>" required>
        <input type="text" name="Image" value="<?php echo $product['Image']; ?>" required>
        <button type="submit">Update Product</button>
    </form>
    <a href="productmanage.php"> 
            <input type="button" value="Back" id="productmanage"> </a>
</body>
</html>
