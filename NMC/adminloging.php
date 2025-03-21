<?php
session_start();
include 'conf.php';

$username = $_POST['Username'];
$password = $_POST['Password'];

// Secure the inputs to prevent SQL injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['Username'] === $username && $row['Password'] === $password) {
        $_SESSION['Username'] = $username;
        // Redirect to home.html
        header("Location: HM.html");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    // Redirect back to login page if credentials are incorrect
    header("Location: Login.html");
    exit();
}
?>