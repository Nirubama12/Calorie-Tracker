<?php

 

$server = "localhost";
$user = "root";
$pass = "";
$db = "test";

 

$conn = new mysqli($server, $user, $pass, $db);

 

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 

if(isset ($_POST['submit']))
{
    $foodItem = $_POST['foodItem'];
    $cals = $_POST['calories'];
    $sql = "INSERT INTO calories (foodItem, calories) VALUES ('$foodItem','$cals')";

 

    if ($conn->query($sql) === TRUE) {
        echo "";} 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;}
 }
$conn->close();
header("Location: https://localhost:4433/calorie-tracker/add-data.html");
exit();
?>