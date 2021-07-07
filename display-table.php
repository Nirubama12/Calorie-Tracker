<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

 </head>
<body>

 <p>Click the buttons to create and delete row(s) for the table.</p>

 <form id="forms">
<label for="name">Username:</label><br>
<input type="text" id="uname" name="name"><br><br>
<label for="name">Select Day:</label><br>
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
<label for="foods">Select Food:</label>
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
</form> 
<br><br>
<button onclick="myCreateFunction()">Insert</button>
<br><br>

 <table id="myTable">
  <tr>
    <td><b>Username</b></td>
    <td><b>Food</b></td>
    <td><b>Calories</b></td>
  </tr>
</table>
<br>
<hr>

 <p id="total"></p>
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
  var table = document.getElementById("myTable");
  var x = document.getElementById("myTable").rows.length;
  var idname = "id"+x;

 

  var row = table.insertRow(x);
  var food = document.getElementById("foods").value;
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell3.id = idname;
  cell1.innerHTML = document.getElementById("uname").value;
  cell2.innerHTML = document.getElementById("foods").value;
  showCals(food, idname);
} 

 

 function myDeleteFunction() {
   var x = document.getElementById("myTable").rows.length;
  document.getElementById("myTable").deleteRow(x);
}

 

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

<button type="button" onclick="location.href='calculators.html'">Calculators!</button>
</body>
</html>
 