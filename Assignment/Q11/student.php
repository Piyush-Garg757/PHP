<?php
session_start();

$con = mysqli_connect("localhost","root","","school");
$user = $_SESSION['username'];

$q = mysqli_query($con, "SELECT * FROM results WHERE student_id='$user'");
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Student</title>
</head>
<body>
<div class="box">
<h2>Your Results</h2>

<table>
<tr><th>Subject</th><th>Marks</th></tr>
<?php while($r=mysqli_fetch_assoc($q)){ ?>
<tr>
<td><?php echo $r['subject']; ?></td>
<td><?php echo $r['marks']; ?></td>
</tr>
<?php } ?>
</table>

<a href="logout.php">Logout</a>
</div>
</body>
</html>
