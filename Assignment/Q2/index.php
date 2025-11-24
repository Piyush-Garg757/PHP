<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $op = $_POST['op'];

    if ($op == "+") $result = $num1 + $num2;
    else if ($op == "-") $result = $num1 - $num2;
    else if ($op == "*") $result = $num1 * $num2;
    else if ($op == "/") {
        if ($num2 == 0) $result = "Error";
        else $result = $num1 / $num2;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="calc">

    <div class="screen">
        <?php 
            if ($result === "") echo "0";
            else echo $result;
        ?>
    </div>

    <form method="POST" class="form">

        <input type="number" step="any" name="num1" placeholder="First number" required class="input">
        <input type="number" step="any" name="num2" placeholder="Second number" required class="input">

        <div class="keys">

            <button name="op" value="+">+</button>
            <button name="op" value="-">−</button>
            <button name="op" value="*">×</button>
            <button name="op" value="/">÷</button>

        </div>

        <button type="submit" class="eq">=</button>

    </form>

</div>

</body>
</html>
