<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_management";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password

    $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Signup successful! <a href='login.php'>Login here</a>";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("fish1.jpg");
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color:DodgerBlue;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 80px;
            padding: 10px;
            background-color: DodgerBlue;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-left:160px;
        }

        button:hover {
            background-color: DodgerBlue;
        }

        .message {
            text-align: center;
            font-size: 14px;
            color: #333;
        }

        .success {
            color: #28a745;
        }

        .error {
            color: #dc3545;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Signup</h1>
        <?php if (!empty($successMessage)): ?>
            <p class="message success"><?php echo $successMessage; ?></p>
        <?php elseif (!empty($errorMessage)): ?>
            <p class="message error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Signup</button>
        </form>
        <p class="message">Already have an account? <a href="login.php">Login here</a></p>
        
        <!-- Link to Home Page -->
        <p class="message">Go back to the <a href="index.php">Home Page</a></p>
    </div>
</body>
</html>
