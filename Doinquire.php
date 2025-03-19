<?php
session_start();
include 'conf.php';  // Include database connection

// Initialize message variable
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $messageContent = $_POST['message']; // Avoid variable conflict

    // Prepare SQL query
    $sql = "INSERT INTO inquire (Name, Email, Subject, Messege) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters and execute query
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $messageContent);
        if (mysqli_stmt_execute($stmt)) {
            // Success message
            $message = "Inquiry submitted successfully!";
        } else {
            // Error message
            $message = "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        // Error preparing the statement
        $message = "Error preparing the statement: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
