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

$uname = $_POST["uname"];
$pass = $_POST["pass"];

$sql1 = "SELECT * FROM calorie WHERE username = $uname" ;

$run = mysqli_query($link,$sql1);
if(!$run)
{
    echo "error".mysqli_error($link);
}

$row = mysqli_fetch_assoc($run);
$pw = $row['password'];

if($pass == $pw)
{
    echo "success!";
}
else{
    echo "Please enter the correct password.";
}



?>
