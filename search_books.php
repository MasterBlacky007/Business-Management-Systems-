<?php
// Database connection
$servername = "localhost";
$username = "Nigeeth";
$password = "2018";
$dbname = "nmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the URL
$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : "";

// SQL query to retrieve data based on the search query
if ($searchQuery) {
    $sql = "SELECT * FROM product WHERE product_name LIKE ? OR product_description LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeQuery = "%" . $searchQuery . "%";
    $stmt->bind_param("ss", $likeQuery, $likeQuery);
} else {
    $sql = "SELECT * FROM product";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();

// Check for errors in query execution
if ($stmt->error) {
    die("Error executing query: " . $stmt->error);
}

$result = $stmt->get_result();

// Check if any results are returned
if ($result->num_rows == 0) {
    echo "No products found.";
    exit;
}

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$stmt->close();
$conn->close();

// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
