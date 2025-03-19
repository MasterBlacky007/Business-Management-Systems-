<?php
include 'conf.php';

// Get data from `register` table
$sql = "SELECT * FROM register";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registered Users</title>
    <link rel="stylesheet" href="rview.css">
</head>
<body>
    <div class="user-container">
        <h1>Registered Users</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Password</th> <!-- Do not display passwords in plaintext -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= $row['Fullname'] ?></td>
                    <td><?= $row['Username'] ?></td>
                    <td><?= $row['Email'] ?></td>
                    <td><?= $row['Phone_Number'] ?></td>
                    <td>******</td> <!-- Mask passwords in plaintext -->
                    <td>
                        <a href="deleteuser.php?id=<?= $row['ID'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="HM.html"> 
            <input type="button" value="Back" id="productmanage"> </a>
    </div>
</body>
</html>
