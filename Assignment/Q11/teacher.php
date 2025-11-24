<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!="teacher") header("Location: login.php");

$con = mysqli_connect("localhost","root","","school");

$msg = "";

if(isset($_POST['upload'])){
    $stu = $_POST['student'];
    $sub = $_POST['subject'];
    $marks = $_POST['marks'];

    mysqli_query($con, "INSERT INTO results (student_id, subject, marks) VALUES ('$stu','$sub','$marks')");
    $msg = "Marks Uploaded";
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Teacher</title>
</head>
<body>
<div class="container">
<h2>Teacher Panel</h2>
<form method="post">
<input type="text" name="student" placeholder="Student Username" required>
<input type="text" name="subject" placeholder="Subject" required>
<input type="number" name="marks" placeholder="Marks" required>

<button name="upload">Upload</button>
</form>
<p style="color:green;"><?php echo $msg; ?></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>
