<?php
include 'conf.php';

// Fetch inquiry data from the database
$sql = "SELECT * FROM inquire";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inquiries</title>
    <link rel="stylesheet" href="Vinquire.css">
</head>
<body>
    <div class="inquiry-container">
        <h1>Inquiry List</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['Name']) ?></td>
                    <td><?= htmlspecialchars($row['Email']) ?></td>
                    <td><?= htmlspecialchars($row['Subject']) ?></td>
                    <td><?= htmlspecialchars($row['Messege']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="HM.html"> 
            <input type="button" value="Back" id="productmanage"> </a>
    </div>
</body>
</html>
