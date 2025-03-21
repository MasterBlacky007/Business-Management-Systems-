<?php
// Database connection details
$host = "localhost";
$db = "nmdb";
$user = "Nigeeth"; // Replace with your username
$pass = "2018"; // Replace with your password

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['Full_Name'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $contact = $_POST['Phone_Number'];
    $password = $_POST['Password'];
    

    // Basic validation
    if (empty($full_name) || empty($username) || empty($email) || empty($contact) || empty($password)) {
        $message = "All fields are required.";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO register (Fullname, Username, Email, Phone_Number, Password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $full_name, $username, $email, $contact, $password);

        if ($stmt->execute()) {
            $message = "Registration successful!";
            
        } else {
            $message = "Error: " . $stmt->error;
        }
        if (mysqli_stmt_execute($stmt)) {
            // Registration successful, redirect to login page
            header("Location: DoNMLogin.php"); // Replace with the actual login page URL
            exit(); // Ensure no further code is executed
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Register Page</title>
        <link rel="stylesheet" href="registerstyle.css">
        <script type="text/javascript">
           function Dovalidate() {
    // Get form inputs
    let inputFull_Name = document.Register.Full_Name.value.trim();
    let inputUsername = document.Register.Username.value.trim();
    let inputEmail = document.Register.Email.value.trim();
    let inputPhone_Number = document.Register.Phone_Number.value.trim();
    let inputPassword = document.Register.Password.value;
    let inputConfirm_Password = document.Register.Confirm_Password.value;

    // Check if full name is empty
    if (inputFull_Name === "") {
        alert("Please fill in the full name!");
        return false;
    }

    // Check if username is empty
    if (inputUsername === "") {
        alert("Please fill in the username!");
        return false;
    }

    // Check if email is empty
    if (inputEmail === "") {
        alert("Please enter an email!");
        return false;
    }

    // Validate email format
    let atpos = inputEmail.indexOf("@");
    let dotpos = inputEmail.lastIndexOf(".");
    if (atpos < 1 || dotpos - atpos < 2 || dotpos === inputEmail.length - 1) {
        alert("Please enter a valid email address!");
        return false;
    }

    // Check if phone number is empty
    if (inputPhone_Number === "") {
        alert("Please enter a phone number!");
        return false;
    }

    // Validate phone number (ensure it contains only digits)
    if (isNaN(inputPhone_Number)) {
        alert("Please enter a valid phone number!");
        return false;
    }

    // Validate phone number length (adjust based on requirements)
    if (inputPhone_Number.length < 10 || inputPhone_Number.length > 15) {
        alert("Phone number must be between 10 and 15 digits!");
        return false;
    }

    // Validate password complexity
    let passwordReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
    if (!passwordReg.test(inputPassword)) {
        alert(
            "Password must contain at least 8 characters, including at least one digit, one uppercase letter, one lowercase letter, and one special character!"
        );
        return false;
    }

    // Check if passwords match
    if (inputPassword !== inputConfirm_Password) {
        alert("Passwords do not match!");
        return false;
    }

    return true; // If all validations pass
}

           
        </script>
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="images.jpeg">
                <h3 style="color: white;">NM CEYLON ORGANICS</h3>
            </div>
        </header>
        <section>
            <div class="wrapper">
                <form name="Register" onsubmit="return Dovalidate()" action="Doregister.php" method="POST">
                    <h1>Registration</h1>

                    <div class="input-box">
                        <div class="input-field">
                            <input type="text" name="Full_Name" laceholder="Full Name"
                            required>
                        </div> 
                        <div class="input-field">
                            <input type="text" name="Username" placeholder="Username"
                            required>
                        </div>
                    </div>  

                    <div class="input-box">
                        <div class="input-field">
                            <input type="email" name="Email" placeholder="Email"
                            required>
                        </div> 
                        <div class="input-field">
                            <input type="number" name="Phone_Number" placeholder="Phone Number"
                            required>
                        </div>  
                    </div>  
                    
                    <div class="input-box">
                        <div class="input-field">
                            <input type="password" name="Password" placeholder="Password"
                            required>
                        </div> 
                        <div class="input-field">
                            <input type="password" name="Confirm_Password" placeholder="Confirm Password"
                            required>
                        </div>
                    </div>
                    <label><input type="checkbox">I hereby declare that
                    the above information provided is true and correct   
                    </label>

                    <button type="submit" class="btn">Register</button>
                </form>
            </div>
        </section>
        <footer class="footer">
            <div class="footer-container">
                <!-- Company Info -->
                <div class="footer-box">
                    <img src="images.jpeg" alt="Company Logo" class="company-logo">
                    <p>Natus eget occaecati, lobortis, vestibulum nam eros, risus lacinia lacus. Lorem accusantium.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
        
                <!-- Company Links -->
                <div class="footer-box">
                    <h3>Our Company</h3>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">About Company</a></li>
                        <li><a href="#">Services We Provide</a></li>
                        <li><a href="#">What We Have Done</a></li>
                    </ul>
                </div>
        
                <!-- Services Links -->
                <div class="footer-box">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="#">Architecture</a></li>
                        <li><a href="#">Exterior Design</a></li>
                        <li><a href="#">Landscape Design</a></li>
                        <li><a href="#">Site Planning</a></li>
                    </ul>
                </div>
        
                <!-- Contact Details -->
                <div class="footer-box">
                    <h3>Contact Details</h3>
                    <ul>
                        <li>125, Central Square, New York</li>
                        <li>91 123-456-7890/91</li>
                        <li>(002) 123-4567</li>
                        <li><a href="mailto:hrinfo@example.com">hrinfo@example.com</a></li>
                    </ul>
                </div>
            </div>

        </footer>
    </body>
</html>        