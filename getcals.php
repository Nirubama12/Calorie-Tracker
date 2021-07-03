


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

  $sql = "SELECT foodItem,calories FROM calories WHERE foodItem = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $_GET['q']);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($food, $cals);
  $stmt->fetch();
  $stmt->close();

  echo "$cals";
  ?>