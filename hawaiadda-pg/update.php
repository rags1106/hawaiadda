<!--PHP CODE TO UPDATE DATA-->
<?php
$fnum = $_GET['fnum'];
if(!empty($_POST["aid"]))
{
  require 'connect.php';
  $query = "UPDATE flights set air_id='$_POST[aid]',source='$_POST[src]',destination='$_POST[dest]',d_time='$_POST[depttime]',a_time='$_POST[arrtime]'  where fnum='$fnum'";
  $query1 = "UPDATE price set capacity='$_POST[ecap]',cost='$_POST[eprice]' where fnum='$fnum' and name='Economy'";
  $query2 = "UPDATE price set capacity='$_POST[bcap]',cost='$_POST[bprice]' where fnum='$fnum' and name='Business'";
  $result = pg_query($query); 
  $result1 = pg_query($query1); 
  $result2 = pg_query($query2); 
  if(!$result or !$result1 or !$result2) 
  {
      echo pg_last_error($db);
  } 
  else {
    header('location: display.php');
    echo "Flight Details Updated Successfully...";
  }
  pg_close($db);
}
?>
<?php
error_reporting(0);
session_start();
//****
if($_SESSION["name"] == 'ADMIN') {
?>

<html>
<title>Update Flight</title></title>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<style>
body
{
	font-family: Arial, Helvetica, sans-serif;
	
  height: auto;
  background-color: white;
}
span{
	padding-left: 10px;
}
.submit-btn {
  background-color: #008CBA; 
  color: white; 
  border: 2px solid #008CBA;
  border-radius: 8px;
  padding: 8px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  position: absolute; 
  left:50%;
}

.submit-btn:hover {
  border: 2px solid red;
  opacity: 1;
  color: white;
  background-color:red ; 
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);		
}

.add-flight {
    border: 1px solid #eee;
    padding: 80px;
    margin-bottom: 60px;
}
.add-flight form label {
    font-size: 15px;
    text-transform: capitalize;
    margin-bottom: 8px;
    color: #000;
    margin-top: 10px;
    display: BLOCK;
    font-weight: 400;
    float: left;
    width: 16%;
    text-align: right;
    margin-right: 4%;
}

.add-flight form select {
    border: 1px solid #008CBA;
    background-color: #fff;
    padding: 8px;
    width: 30%;
    margin-bottom: 25px;
}
.add-flight form input {
    border: 1px solid #008CBA;
    background-color: #fff;
    padding: 8px;
    width: 30%;
    margin-bottom: 25px;
}
.title {
  padding: 5px; 
  text-align: center;
  color: black;
}
.layout{
  margin: 2%;
}
</style>

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
          <li><a href="display.php"><i class="fas fa-columns"></i> DISPLAY</a></li>
          <li><a href="admininput.php"><i class="fas fa-plus"></i> ADD FLIGHT</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="signout.php"><span class="fa fa-sign-out"></span> SIGN OUT</a></li>
        </ul>
      </div>
  </nav>

<div class="layout">
<h3>Update Flight : <?php echo $fnum;?></h3>
<div class="add-flight">
<form action="" method="post">
	    <label>Airplane ID<span>*</span></label>
    <select name="aid" class="title" required>
      <option value="" disabled selected hidden>Select aircraft-airline</option>
      <option value="1100">A320-Air India</option>
      <option value="1101">A321-Air India</option>
      <option value="1102">A321-IndiGO</option>
      <option value="1103">ATR72-IndiGO</option>
      <option value="1104">B737-Spice Jet</option>
      <option value="1105">BQ400-Spice Jet</option>
    </select>
    <br>
		<label>Select Source<span>*</span></label>
		<select name="src" class="title" required>
		  <option value="" disabled selected hidden>Select Source</option>
		  <option value="BOM">Mumbai Chattrapathi Shivaji International Airport</option>
		  <option value="BLR">Bangalore Bengaluru International Airport</option>
		  <option value="HYD">Hyderabad Rajiv Gandhi International Airport</option>
      <option value="MAA">Chennai Meenambarkkam International Airport</option>
      <option value="CCU">Kolkata Netaji Subhash Chandra Bose</option>
      <option value="DEL">New Delhi Indira Gandhi International Airport</option>
      <option value="AMD">Ahmedabad SD Vallabhbhai Patel International Airport</option>
      <option value="GOI">Dabolim Goa International Airport</option>
      <option value="COK">Cochin Airport, Kerala Cochin International Airport</option>
		</select>
		<br>
		<label>Select Destination<span>*</span></label>
		<select name="dest" class="title" required>
		  <option value="" disabled selected hidden>Select Destinations</option>
		  <option value="BOM">Mumbai Chattrapathi Shivaji International Airport</option>
      <option value="BLR">Bangalore Bengaluru International Airport</option>
      <option value="HYD">Hyderabad Rajiv Gandhi International Airport</option>
      <option value="MAA">Chennai Meenambarkkam International Airport</option>
      <option value="CCU">Kolkata Netaji Subhash Chandra Bose</option>
      <option value="DEL">New Delhi Indira Gandhi International Airport</option>
      <option value="AMD">Ahmedabad SD Vallabhbhai Patel International Airport</option>
      <option value="GOI">Dabolim Goa International Airport</option>
      <option value="COK">Cochin Airport, Kerala Cochin International Airport</option>
		</select>
		<br>
		<label>Departure Time<span>*</span></label>
		 <input type="time" value="dateTime" name="depttime" required></input>
		 <br>
		<label>Arrival Time<span>*</span></label>
		 <input type="time" name="arrtime" required></input>
      <br>
    <label>Economy Capacity<span>*</span></label>
     <input type="text" name="ecap" required></input>
      <br>
    <label>Economy Price<span>*</span></label>
     <input type="text" name="eprice" required></input>
      <br>
    <label>Business Capacity<span></span></label>
     <input type="text" name="bcap"></input>
      <br>
    <label>Business Price<span></span></label>
     <input type="text" name="bprice"></input>
      <br>  
      <br>
      <button type="submit" class="submit-btn">Submit</button>
</form>
</div>  
</div>
<script>
	function dt(){
	var today = new Date();
var date = today.getFullYear()+'-'+today.getMonth()+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+'T'+time;
return dateTime;
}
var x = dt();
document.getElementById("demo").innerHTML = x;
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