<?php
$con = mysqli_connect("localhost","root","","school");

$msg = "";

if(isset($_POST['reg'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $r = $_POST['role'];

    $q = mysqli_query($con, "INSERT INTO users (username, password, role) VALUES ('$u','$p','$r')");
    
    if($q) $msg = "Registration Successful";
    else $msg = "Error";
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Register</title>
</head>
<body>
<div class="box">
<h2>Register</h2>
<form method="post">
<input type="text" name="username" placeholder="Create Username" required>
<input type="text" name="password" placeholder="Create Password" required>

<select name="role" required>
<option value="">Select Role</option>
<option value="student">Student</option>
<option value="teacher">Teacher</option>
</select>

<button name="reg">Register</button>
</form>

<p style="color:green;"><?php echo $msg; ?></p>

<a href="login.php">Already have an account? Login</a>
</div>
</body>
</html>
