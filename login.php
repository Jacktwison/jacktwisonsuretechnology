<?php
session_start(); // Start session for logged-in user

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_management";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the email and password from the POST request
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Query the database to find the user by email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Check if the password matches
        if (password_verify($pass, $row['password'])) {
            // Store user information in session
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role']; // Assuming 'role' column stores user role

            // If the user is an admin, redirect to the admin page (data.php)
            if ($_SESSION['role'] == 'admin') {
                header("Location: data.php");
            } else {
                echo "You do not have admin privileges.";
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Fish Farming Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don’t have an account? <a href="signup.php">Signup</a></p>
    </div>
</body>
</html>
