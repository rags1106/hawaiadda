<?php
// Start the session
session_start();

include_once 'connect.php';

$type = $_POST["type"];
date_default_timezone_set("America/Chicago");
$t=time();
$time = date("Y-m-d h:i:s");


if(!isset($_SESSION["name"])){
    header("Location: signin.php");
}else{
    $user = $_SESSION["name"];


	if($type =="all" || $type =="onewaynonstop" )
	{

		$flightno = $_POST["flightno"];
		$class = $_POST["classtype"];
		$price = $_POST["price"];
		$date = $_POST["date"];
		$depttime= $_POST["dtime"];
		$sql = "INSERT INTO book (time, date, fnum, username, classtype, paid) 
				VALUES ('$time', '$date', '$flightno', '$user', '$class', '0')";;

		$result = pg_query($db,$sql);
	    header("Location: mycart.php");
	}

    echo "Error adding to cart..";
	pg_close($db);

}

?>



