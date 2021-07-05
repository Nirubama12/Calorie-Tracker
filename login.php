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
$un = $row['username'];
$role = $row['role'];

if($pass == $pw)
{
    echo "success!";
}
/*else{
    echo "Please enter the correct password.";
}*/

else{
    if($role == "User"){
        session_start();
        $_SESSION['username'] = $un;
        $_SESSION['role'] = $row['role'];
        echo '<meta http-equiv= "refresh" content="1; url=/Calorie-Tracker/calculators.html"/>';
    }
    else if($role == "Nutritionist"){
        session_start();
        $_SESSION['username'] = $un;
        $_SESSION['role'] = $row['role'];
        echo '<meta http-equiv= "refresh" content="1; url=/Calorie-Tracker/calculators.html"/>';
    }
}



?>
