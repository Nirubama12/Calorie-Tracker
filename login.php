<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "calorie";

$link = mysqli_connect($host, $user, $pass, $db);

if(!$link)
{   
    echo "Connection Failed.".mysqli_error($link);
}


    $name = $_POST["fname"];
    $age = $_POST["age"];
    $height = $_POST["ht"];
    $weight = $_POST["wt"];
    $mail = $_POST["mail"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $role = $_POST["role"];

    $sql1 = "INSERT INTO calorie(name,age,height,weight,email,username,password,role) 
    VALUES ('$name', '$age', '$height', '$weight', '$mail', '$uname', '$password', '$role')";

    $run = mysqli_query($link, $sql1);

    if($run)
    {
        echo "success";
    }
    else
    {
        echo "error".mysqli_error($link);
    }

mysqli_close($link);
?>
<html>
    <body><button type="submit" style="location.href: 'login.html'">Go to Login</button>
</html>

