<?php 
  $server = "localhost";
  $user = "root";
  $pass = "";
  $db = "test";
  
  session_start();
  $conn = new mysqli($server, $user, $pass, $db);

  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

$day = $_GET['day'];
$sum = $_GET['sum'];
$uname = $_GET['uname'];



 $sql = "SELECT `username` FROM `food` WHERE `username` = '$uname'";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_num_rows($result);
 if ($row == 0)
 {
 	$sql2 = "INSERT INTO food (username,$day) VALUES ('$uname','$sum')";

	if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";} 
    else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;}
 }
 
 $sql1 = "UPDATE `food` SET `$day`='$sum' WHERE `username`='$uname'";
 	$result1 = mysqli_query($conn, $sql1);

 $sql3 = sprintf("SELECT sun,mon,tue,wed,thur,fri,sat FROM food WHERE username='$uname'");
 $result3 = $conn->query($sql3);
 $data = array();
foreach ($result3 as $row) {
  $data[] = $row;
}

header("Location: https://localhost:4433/calorie-tracker/weekly-avg.html");
exit();

$conn->close();


?>