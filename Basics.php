<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
</head>
<body>
    <div class="container">
        This is my first php website
    </div>
    <?php
        echo  "Hello world, This is printed using php <br>";
        
        $var1=12;
        $var2=34;
        
        echo "The sum of var1 and var2 is ";
        echo $var1+$var2;
        echo "<br>";
        echo "The value of 1==4 is ";
        echo var_dump(1==4);
        echo "<br>";

        $v=(true and true);
        echo var_dump($v);

        $age=19;
        if($age>=18) echo"You can go to party";
        else echo "You are not allowed to leave house";
    ?>
</body>
</html>