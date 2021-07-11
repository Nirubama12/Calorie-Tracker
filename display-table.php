<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="display-table.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

 

</head>
<body>
<a href="calculators.html" target="_blank" style="font-size:50px; margin-right: 2%;width:100%";><i class="fa fa-calculator" style="margin-left: 90%;"></i></a>
<div class="signup-container">

 

  <div class="left-container">
    <h1 style="color: white; font-size:40px;">
      <i class="fa fa-heartbeat"></i>
      FITNESSIVE
    </h1>
  <div class="fitness">
    <img src="2.png" style="height:30%; width:40%;">
  </div>
</div>

 

 

<div class="right-container">
  <header>
    <h1 id="tagline">Yay! Let's get Fitter, Healthier and Happier!</h1>
    
<div class="set">
<form id="forms">  
    <div class="user-name">
    <label for="uname">Username:</label><br>
    <input type="text" id="uname" name="name" placeholder="Enter your username"><br><br>
    </div>

 

    <div class="day">
    <label for="day">Select Day:</label><br>
    <select name="day" id="day">
    <option value="sun">Sunday</option>
    <option value="mon">Monday</option>
    <option value="tue">Tuesday</option>
    <option value="wed">Wednesday</option>
    <option value="thur">Thursday</option>
    <option value="fri">Friday</option>
    <option value="sat">Saturday</option>
    </select>
    <br><br>
    </div>

 

    <div class="food-list">
    <label for="foods">Select Food:</label><br>
    <select name="foods" id="foods" onchange="showCals(this.value)">    
      
    

 

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
    
          $sql = "SELECT * FROM calories";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_array($result))
          {
            echo '<option>'.$row['foodItem'].'</option>';
          }
          ?>
    

 


     </select>
     </div>
     </form> 
     </div>
     <br><br>
     <button onclick="myCreateFunction()" id="insertbtn">Insert</button>
     <br><br>
     </header>
     </div>
   </div>

 

 

<table id="mytable">
  <tr id="header-row">
    <td><b>Username</b></td>
    <td><b>Food</b></td>
    <td><b>Calories</b></td>
  </tr>
</table>
<br>
<div id="total-disp">
<p id="total-text">Your Total is :</p>
<p id="total">0</p>
</div>
<br><br>
<button id="donebtn" onclick="storedaycal()">I am done for the day!</button>
<br><br>
<p id="idname1"></p>

 

 

 

 


<script>
  var sum = 0;
  var xvals = [];
  var yvals = [];
  var i = 0;

 

  function myCreateFunction() {
  var table = document.getElementById("mytable");
  var x = document.getElementById("mytable").rows.length;
  var idname = "id"+x;

 

  var row = table.insertRow(x);
  var food = document.getElementById("foods").value;
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell3.id = idname;
  row.id = "content-row";
  cell1.innerHTML = document.getElementById("uname").value;
  cell2.innerHTML = document.getElementById("foods").value;
  showCals(food, idname);
} 

 

 /*function myDeleteFunction() {
   var x = document.getElementById("myTable").rows.length;
  document.getElementById("myTable").deleteRow(x);
}*/

 

function showCals(str,idname) {
  var xhttp;    
  if (str == "") {
    document.getElementById(idname).innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(idname).innerHTML = this.responseText;
      total(this.responseText);
    }
  };
  xhttp.open("POST", "getcals.php?q="+str, true);
  xhttp.send();
}

 

function total(vals) {
  var x = parseInt(vals);
  sum = sum + x;
  document.getElementById("total").innerHTML = sum;
}

 

function storedaycal()
{

 

  var day = document.getElementById("day").value;
  var uname = document.getElementById("uname").value;
  window.location='storedaycal.php?day='+day+'&sum='+sum+'&uname='+uname;
}
</script>

 

</body>
</html>
 