<?php
session_start();
$con = mysqli_connect("localhost","root","","school");

$msg = "";

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = mysqli_query($con, "SELECT * FROM users WHERE username='$u' AND password='$p'");

    if(mysqli_num_rows($q)==1){
        $d = mysqli_fetch_assoc($q);
        $_SESSION['username'] = $d['username'];
        $_SESSION['role'] = $d['role'];

        if($d['role']=="teacher") header("Location: teacher.php");
        else header("Location: student.php");
    }  
    else $msg = "Invalid Login";
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Login</title>
</head>
<body>
<div class="box">
<h2>Login</h2>
<form method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="text" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>
<p style="color:red;"><?php echo $msg; ?></p>

<a href="register.php">Create New Account</a>
</div>
</body>
</html>
