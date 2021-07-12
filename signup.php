<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "calorie";

$link = mysqli_connect($server, $user, $pass, $db);

if(!$link)
{   
    echo "Connection Failed.".mysqli_error($link);
}
//inserting data into table
    $name = $_POST['fname'];
    $age = $_POST['age'];
    $height = $_POST['ht'];
    $weight = $_POST['wt'];
    $mail = $_POST['mail'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    $sql1 = "INSERT INTO calorie(name,age,height,weight,email,username,password,role) 
    VALUES ('$name', '$age', '$height', '$weight', '$mail', '$uname', '$pass', '$role')";

    $run = mysqli_query($link, $sql1);

    if($run)
    {
        echo "<h1>Account created successfully!</h1>";
    }
    else
    {
        echo "error".mysqli_error($link);
    }

mysqli_close($link);
?>
<html>
    <head>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

    <link rel="stylesheet" href="signup.css"/>
    </head>
    <body>
        <button type="submit" id="sub" onclick="location.href='ls.html'">Go to Login</button>
    </body>
</html>

