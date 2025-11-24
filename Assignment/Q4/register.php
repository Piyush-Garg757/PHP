<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "regapp_db";

// Create connection
$con = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $check_email);
    if (mysqli_num_rows($result) > 0) {
        echo "Email already registered. <a href='register.php'>Try again</a>";
        exit();
    }

    $sql = "INSERT INTO users (name, email, password, created_at) VALUES ('$name', '$email', '$hashed_password', NOW())";

    if (mysqli_query($con, $sql)) {
        echo "User registered successfully! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

$con->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>User Registration</h1>
        <form method="post" action="register.php">
            <input type="text" name="name" placeholder="Enter name" required>
            <input type="email" name="email" placeholder="Enter email" required>
            <input type="password" name="password" placeholder="Enter password" required>
            <button class="btn" type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>

</body>

</html>