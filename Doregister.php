<?php
session_start();
include 'conf.php'; // Include your database connection file

// Retrieve form data
$full_name = $_POST['Full_Name'];
$username = $_POST['Username'];
$email = $_POST['Email'];
$contact = $_POST['Phone_Number'];
$password = $_POST['Password'];
$confirm_password = $_POST['Confirm_Password'];

// Check if passwords match
if ($password !== $confirm_password) {
    die("Passwords do not match!");
}

// Hash the password for secure storage
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the SQL statement
$sql = "INSERT INTO register (Fullname, Username, Email, Phone_Number, Password) VALUES (?,?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssss", $full_name, $username, $email, $contact, $password);
    if (mysqli_stmt_execute($stmt)) {
        // Registration successful, redirect to login page
        header("Location: DoNMLogin.php"); // Replace with the actual login page URL
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing the statement: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
