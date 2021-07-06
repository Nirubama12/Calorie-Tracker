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
        echo "New record created successfully";} 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;}
 }

$conn->close();
?>

<button onclick="location.href='add-data.html'" type="button">
         Add more Data</button>

<button onclick="location.href='display-table.php'" type="button">Go to User page</button>