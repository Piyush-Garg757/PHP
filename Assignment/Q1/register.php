<?php
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password, "regapp_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "INSERT INTO users (name, email, password, created_at) 
        VALUES ('$name', '$email', '$pass', current_timestamp())";

if ($con->query($sql) === TRUE) {
    echo "User registered successfully! <br><a href='index.html'>Go Back</a>";
} else {
    echo "Error: " . $con->error;
}

$con->close();
?>