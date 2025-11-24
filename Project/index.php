<?php
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password, "piyush");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$name   = $_POST['name'];
$age    = $_POST['age'];
$gender = $_POST['gender'];
$email  = $_POST['email'];
$phone  = $_POST['phone'];
$other  = $_POST['desc'];

// 1. Check if email already exists
$check_sql = "SELECT * FROM `trip` WHERE `Email` = '$email'";
$check_result = $con->query($check_sql);

if ($check_result->num_rows > 0) {
    // Email already exists
    echo "Email already registered! Please use another email.";
} else {
    // 2. Insert new record
    $sql = "INSERT INTO `trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";

    if ($con->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $con->error;
    }
}

$con->close();
?>