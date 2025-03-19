<?php
include 'conf.php';

// Get the product ID from the URL
$id = $_GET['id'];

// Delete product from the database
$query = "DELETE FROM product WHERE id = $id";

if (mysqli_query($conn, $query)) {
    header("Location: productmanage.php?success=true");
    exit();
} else {
    echo "Error deleting product: " . mysqli_error($conn);
}
?>
