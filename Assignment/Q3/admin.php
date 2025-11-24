<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function stars($n)
{
    return str_repeat("&#9733;", $n) . str_repeat("&#9734;", 5 - $n);
}

$sql = "SELECT * FROM feedback ORDER BY id DESC";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Feedback Records</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="box">

        <marquee class="marq" onmouseover="this.stop();" onmouseout="this.start();">
            📜 Admin Panel — All Submitted Feedback 📜
        </marquee>

        <h1>Submitted Feedback</h1>

        <table border="1" class="tbl">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Rating</th>
                <th>Date</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['message'] . "</td>
                        <td>" . stars($row['rating']) . "</td>
                        <td>" . $row['date'] . "</td>
                      </tr>";
                }
            }
            ?>
        </table>

        <a class="view" href="index.html">Go Back</a>

    </div>

</body>

</html>

<?php $con->close(); ?>