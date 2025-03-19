<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "You must login first! <a href='DoALogin.php'>Login here</a>";
    exit();
}
echo '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin Dashboard</title>
    <link rel="stylesheet" href="ds.css">
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <h2>Library Dashboard</h2>
            <ul>
                <li><a href="firstpage.html">Home</a></li>
                <li><a href="add.html">Add Books</a></li>
                <li><a href="editbook.php">Edit Books</a></li>
                <li><a href="deletebook.php">Delete Books</a></li>
                <li><a href="viewbook.php">View Books</a></li>
                <li><a href="search_books.html">Search Books</a></li>
                <li><a href="AdminLogin.html">Logout</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header>
                <h1>Welcome: ' . $_SESSION['username'] . '!</h1>
            </header>
            <section>
                <h2>Operations</h2><br><br>
                <div class="operations">
                <div class="operation-box">
                    <img src="images/10.webp" alt="Add Icon">
                    <a href="add.html">Add Books</a>
                </div>
                <div class="operation-box">
                    <img src="images/edit.png" alt="Edit Icon">
                    <a href="editbook.php">Edit Books</a>
                </div>
                <div class="operation-box">
                    <img src="images/delete.png" alt="Delete Icon">
                    <a href="deletebook.php">Delete Books</a>
                </div>
                <div class="operation-box">
                    <img src="images/view.webp" alt="View Icon">
                    <a href="viewbook.php">View Books</a>
                </div>
                <div class="operation-box">
                    <img src="images/search.png" alt="Search Icon">
                    <a href="search_books.html">Search Books</a>
                </div>
            </div>

            </section>
        </main>
    </div>
    <footer>
        <p>&copy; 2024 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
';
?>