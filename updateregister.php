<?php
include 'conf.php';

// Get the user details from the form
$id = $_POST['ID'];
$fullName = $_POST['Fullname'];
$username = $_POST['Username'];
$email = $_POST['Email'];
$phoneNumber = $_POST['Phone_Number'];
$password = $_POST['Password']; // Make sure the password is hashed before saving

// Sanitize input to prevent SQL injection
$fullName = mysqli_real_escape_string($conn, $fullName);
$username = mysqli_real_escape_string($conn, $username);
$email = mysqli_real_escape_string($conn, $email);
$phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
$password = mysqli_real_escape_string($conn, $password);

// Encrypt the password (assuming it should be hashed)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Update user details in the `register` table
$query = "UPDATE register SET Fullname='$fullName', Username='$username', Email='$email', Phone_Number='$phoneNumber', Password='$hashedPassword' WHERE ID=$id";

if (mysqli_query($conn, $query)) {
    header("Location: viewregister.php?success=true");
    exit();
} else {
    echo "Error updating user: " . mysqli_error($conn);
}
?>
