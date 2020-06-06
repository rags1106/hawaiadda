<?php error_reporting(0); ?>
<?php
session_start();

//****
if($_SESSION["name"] == 'ADMIN') {
?>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>


  <!-- for navbar -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<!--ICONS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--ICONS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!--CSS-->
<style>
 
body{
	
}
table{
  margin: 2%;
	border-collapse: collapse;
  width: 100%;
}
th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(even){background-color: #e6f9ff}
th {
  background-color:   #0099cc;
  color: white;
}

#ip2 {
    border-radius: 25px;
    border: 2px solid #008CBA;
    padding: 20px;
    margin: 20px 2px; 
    width: 200px;
    height: 15px;    
}
.del-btn{
	background: none;
	border: none;
}
.submit-btn {
  background-color: #008CBA; 
  color: white; 
  border: 2px solid #008CBA;
  border-radius: 25px;
  padding: 8px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 20px 2px;
  margin-left: 10px;
  cursor: pointer;
  position: absolute; 

}

.submit-btn:hover {
  opacity: 1;
  border: 2px solid red;
  color: white;
  background-color:red; 
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);		
}
.title {
  padding: 5px; 
  text-align: center;
  color: black;
}
.headings{
  padding-left: 2%;
}
</style>
<!--CSS-->

</head>
<body>
  <div class="title"><h2>HAWAI ADDA</h2></div>
  <!--navbar-default-->
  <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!--<div class="navbar-header">
            <a class="navbar-brand" href="#"><div class="title">Hawai Adda</div></a>
        </div>  -->
        <ul class="nav navbar-nav">
          <!--<li><a href="index.php">HOME</a></li>-->
          <li class="active"><a href="display.php"><i class="fas fa-columns"></i> DISPLAY</a></li>
          <li><a href="admininput.php"><i class="fas fa-plus"></i> ADD FLIGHT</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="signout.php"><span class="fa fa-sign-out"></span> SIGN OUT</a></li>
        </ul>
      </div>
  </nav>
</body>
</html>

<?php
require 'connect.php';

$sql = "SELECT * from airplane";
$ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   }

echo "<h3 class='headings'>Airplane Data</h3>";
echo "<table style='width:auto'>";
echo "<tr> <th>Airplane</th><th>Type</th><th>Airline</th></tr>";
while($row = pg_fetch_row($ret)) {
    // output data of each row
    echo "<tr><td>".$row[0]."</td><td>" . $row[1]. "</td><td>" . $row[2]. "</td></tr>";
} 
echo "</table>";
echo "<hr>";

//Airports
$sql ="SELECT * from airport";
$ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   }

echo "<h3 class='headings'>Airports</h3>";
echo "<table style='width:auto'>";
echo "<tr> <th>Code</th><th>Type</th></tr>";
while($row = pg_fetch_row($ret)) {
    // output data of each row
    echo "<tr><td>".$row[0]."</td><td>" . $row[1]. "</td></tr>";
} 
echo "</table>";
echo "<hr>";

//Price
$sql ="SELECT * from price";
$ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   }

echo "<h3 class='headings'>Price</h3>";
echo "<table style='width:auto'>";
echo "<tr> <th>Flight</th><th>Name</th><th>Capacity</th><th>Cost</th></tr>";
while($row = pg_fetch_row($ret)) {
    // output data of each row
    echo "<tr><td>".$row[0]."</td><td>" . $row[1]. "</td><td>" . $row[2]. "</td><td>" . $row[3]. "</td></tr>";
} 
echo "</table>";
echo "<hr>";

//flights
$sql ="SELECT * from flights ORDER BY fnum asc";
$ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   }

echo "<h3 class='headings'>Flights</h3>";

echo "<table style='width:auto'>";
    echo "<tr> <th>Flight Number</th><th>Airplane</th><th>Source</th><th>destination</th><th>Departure Time</th><th>Arrival Time</th><!--<th></th>--></tr>";
    
    while($row = pg_fetch_row($ret)) 
    {
    	//echo "<form action='delete.php' method='post'>";
    	//echo "<input type='hidden' name='fnum' value='$row[5]'>";
        echo "<tr><td>".$row[5]."</td><td>" . $row[0]. "</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><!--<td><button style='font-size:24px' type='submit' class='del-btn'><i data-toggle='tooltip' title='delete flight' class=' fas fa-trash-alt' style='font-size:18px;color:red'></i></button></td>--></tr>";
        //echo "</form>";
    }
  echo "</table>";


?>
<html>
<body>
<hr>
<div class='headings'>
	<form action="update.php" method="get">
		<input type="text" name="fnum" placeholder="enter flight number" id="ip2" data-toggle='tooltip' title='enter flight number to be updated' required />
		<button type="submit" class="submit-btn">Update</button>
	</form>
</div>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<!--FOR AUTHENTICATION-->
<?php
}
else
{
  echo "<h3>404 Page Not Found</h3>";
}
?>
</body>
</html>