<?php
include 'conf.php';

// Get the user ID from the URL
$id = $_GET['id'];

// Fetch user details from the database
$query = "SELECT * FROM register WHERE ID = $id";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error fetching user: " . mysqli_error($conn);
    exit();
}

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="redit.css">
</head>
<body>
    <h1>Edit User</h1>
    <form action="updateregister.php" method="POST">
        <input type="hidden" name="ID" value="<?php echo $user['ID']; ?>">
        <input type="text" name="FullName" value="<?php echo $user['Fullname']; ?>" required>
        <input type="text" name="Username" value="<?php echo $user['Username']; ?>" required>
        <input type="email" name="Email" value="<?php echo $user['Email']; ?>" required>
        <input type="tel" name="PhoneNumber" value="<?php echo $user['Phone_Number']; ?>" required>
        <input type="password" name="Password" placeholder="Enter Password" required>
        <button type="submit">Update User</button>
    </form>
</body>
</html>
