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
  //include 'storedaycal.php';

  //chart for weekly calorie intake
  $sql = "SELECT `sun`,`mon`,`tue`,`wed`,`thur`,`fri`,`sat` FROM `food` WHERE `username` = 'vrocks9'";
  $arr = ['sun','mon','tue','wed','thur','fri','sat'];
  $cals = array();
  $i = 0;
  $result = mysqli_query($conn,$sql);
  while(($row = mysqli_fetch_assoc($result)))
   {
    $cals[0] = $row['sun'];
    $cals[1] = $row['mon'];
    $cals[2] = $row['tue'];
    $cals[3] = $row['wed'];
    $cals[4] = $row['thur'];
    $cals[5] = $row['fri'];
    $cals[6] = $row['sat'];
   }
print(json_encode($cals));
$conn->close();

?>