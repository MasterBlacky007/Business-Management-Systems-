<?php
include 'conf.php';

// Get the user ID from the URL
$id = $_GET['id'];

// Delete user from the database
$query = "DELETE FROM register WHERE ID = $id";

if (mysqli_query($conn, $query)) {
    header("Location: viewregister.php?success=true");
    exit();
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}
?>
