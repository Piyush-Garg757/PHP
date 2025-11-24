<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$rating = $_POST['rating'];

$sql = "INSERT INTO feedback (name, email, message, rating, date) 
        VALUES ('$name', '$email', '$message', '$rating', current_timestamp())";

if ($con->query($sql) === TRUE) {
    echo "<h1 style='color:green;text-align:center;margin-top:40px;'>Feedback Submitted!</h1>";
    echo "<p style='text-align:center;'><a href='index.html'>Submit Another</a></p>";
    echo "<p style='text-align:center;'><a href='admin.php'>View Feedback</a></p>";
} else {
    echo "Error: " . $con->error;
}

$con->close();
?>