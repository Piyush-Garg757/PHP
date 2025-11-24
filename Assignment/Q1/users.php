<?php
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password, "regapp_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users ORDER BY id DESC";
$res = $con->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>All Users</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <marquee class="m1">📜 All Registered Users Below 📜</marquee>

    <div class="container">
        <h1>Registered Users</h1>

        <table class="user-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Date</th>
            </tr>

            <?php
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['password'] . "</td>
                        <td>" . $row['created_at'] . "</td>
                      </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>
        </table>

        <a class="view" href="index.html">Back to Register</a>
    </div>

</body>

</html>