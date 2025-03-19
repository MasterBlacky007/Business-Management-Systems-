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

// SQL query to retrieve product data
$sql = "SELECT ID, Name, Price, Image FROM product";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products); // Return results as JSON
} else {
    echo json_encode([]); // No products found
}

$conn->close();
?>
