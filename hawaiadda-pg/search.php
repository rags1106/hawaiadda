<?php
	error_reporting(0); 
	session_start();
	$message="";
	$source      = $_SESSION['ffrom'];
	$destination = $_SESSION['fto'];
	$class       = $_SESSION['class'];
	$date        = $_SESSION['date'];
?>
<html>
<title>search</title>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- for navbar -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  	<!-- for icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		body
		{
			background: url(images/airline1.jpg);
			background-repeat: no-repeat;
			background-size: auto;
		}  
		.message
		{
			color: red;
		}

		.title 
		{
		  	padding: 5px; 
		  	text-align: center;
		  	color: white;
		}
		.div {
		  width: 320px;
		  padding: 10px;
		  border: 5px solid gray;
		  margin: 0;
		}
		.flex-container {
		  display: flex;
		  flex-direction: column;
		  background-color: white;
		  margin: 10px;
		}

		.flex-container-div {
		  background-color: white;
		  box-shadow: 0 0 11px rgba(33,33,33,.2);
		  width: auto;
		  margin: 10px;
		  text-align: center;
		  line-height: auto;
		  color: black;
		  font-size: 16px;
		}
		.image {
		  	display: block;
		  	width: auto;
		  	height: 60px;
		  	border-radius: 8px;
		  	float: right;
  			margin: 15px;
		}

		.f-price{
			display:block;
			font-size:20px;
			display: block;
		    color: red;
		    margin: 5px 0 0 0;
		}

		.f-title 
		{
		  	padding: 5px; 
		  	text-align: center;
		  	color: red;
		}

		/* Set a style for all buttons */

		.submit-btn 
		{
		  color: #fff;
		  background-color: #f23e3e;
		  padding: 10px 30px;
		  margin: 5px;
		  font-weight: 400;
		  cursor: pointer;
		  height: 50px;
		  font-size: 18px;
		  border: none;
		  width: auto;
		  border-radius: 10px;
		  text-align: center;
		  text-transform: uppercase;
		  -webkit-transition: 0.2s all;
		  transition: 0.2s all;
		  opacity: 1.0;
		}
		/* Add a hover effect for buttons */
		.submit-btn:hover 
		{
			opacity: 1.0;
		}
	</style>
</head>

<body>
	<div class="title"><h2>HAWAI ADDA</h2></div>
	<!--Navbar-->
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<!--<div class="navbar-header">
      			<a class="navbar-brand" href="#"><div class="title">Hawai Adda</div></a>
    		</div>	-->
    		<ul class="nav navbar-nav">
		      <li><a href="index.php">Home</a></li>
		      <li><a href="contactus.php"><i img></i> Contact</a></li>
		     
		    	<?php
					if($_SESSION["name"]) 
					{
				?>
						<li><a href="mycart.php"><i class="glyphicon glyphicon-shopping-cart"></i> Cart</a></li>
            			<li><a href="bookings.php"><i class="glyphicon glyphicon-check"></i> My Bookings</a></li>
						</ul>
						<p class="navbar-text">Welcome, <?php echo $_SESSION["name"]; ?></p>
						<ul class="nav navbar-nav navbar-right">
          					<li><a href="signout.php"><span class="fa fa-sign-out"></span> SIGN OUT</a></li>
        				</ul>
				<?php
					}
					else
					{
				?>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-fw fa-user"></i>	Login<span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="signin.php">User</a></li>
			          <li><a href="adminlogin.php">Admin</a></li>
			        </ul>
	      		</li>
      		</ul>
				<?php
					}
				?>     	
  		</div>
	</nav>

	<!--Searching for flights-->
	<?php
	require 'connect.php';

	global $availableNumber;

	$query1 = "select f.fnum,f.d_time,f.a_time,p.name,p.cost,f.air_id FROM flights f natural join price p WHERE f.source='$source' and f.destination = '$destination' and p.name='$class'";
	$query2 = "select name as source from airport where code='$source' limit 1"; 
	$query3 = "select name as destination from airport where code='$destination' limit 1"; 

	$result1 = pg_query($db,$query1); 
	$result2 = pg_query($db,$query2); 
	$result3 = pg_query($db,$query3);  
	
	
	if(!pg_affected_rows($result1))
	{
		$message = "Sorry No flights...";
		echo $message;
	} 
	else
	{
		$row2 = pg_fetch_row($result2); //source
		$row3 = pg_fetch_row($result3); //destination
		
		//echo "<form action='mycart.php' method='post'>";
		echo "<div class='flex-container'>";
		while($row1 = pg_fetch_row($result1))
		{
    		//$_SESSION["id"] = $row[0];
    		$query4 = "select airline from airplane where id='$row1[5]'";
    		$result4 = pg_query($db,$query4);  
    		$row4 = pg_fetch_row($result4);	
   				
   			
	    	echo "<div class='flex-container-div'>";
			echo "<span class='f-title'>Flight No:</span>".$row1[0]." Departure:" . $row1[1]. " Arrival:" . $row1[2]." Class:" . $row1[3];
			echo "<br>";
			echo "<img src='images/$row4[0].jpg' alt='Avatar' class='image'>";
			echo "Source:".$row2[0]." Destination:" . $row3[0];
			echo "<span class='f-price'>Rs." . $row1[4]."</span>";


			//calculate number of remain seats
	        $seatreserved = "SELECT fnum, classtype, COUNT(*)
	                    FROM book B
	                    WHERE B.date = '".$date."' AND B.fnum = '".$row1[0]."'AND B.classtype ='".$row1[3]."' AND paid=1
	                    GROUP BY fnum, classtype";
	        $reserved = pg_query($db,$seatreserved);   
	        $reservedNumber = pg_fetch_row($reserved);
	        
	        $capacity = pg_query($db, "SELECT capacity FROM price C WHERE C.fnum='".$row1[0]."' AND C.name= '".$row1[3]."'");
	        $capacityNumber = pg_fetch_row($capacity);


	        if(pg_affected_rows($reserved)>0){            
	            $availableNumber = $capacityNumber[0] - $reservedNumber[2];
	        }else{
	            $availableNumber = $capacityNumber[0];
	        }

	        echo "Seats available:".$availableNumber;

	        if($availableNumber>0)
	        {
		    	echo '<form action="insertcart.php" method="post">
		        <input type="hidden" name="flightno" value="'.$row1[0].'">
		        <input type="hidden" name="classtype" value="'.$row1[3].'">
		        <input type="hidden" name="price" value="'.$row1[4].'">
		        <input type="hidden" name="date" value="'.$date.'">
		        <input type="hidden" name="dtime" value="'.$row1[1].'">
		        <input type="hidden" name="type" value="all">
		        <button type="submit" class="submit-btn">Book</button>
		        
		        </form>';
		    }else{
		        //echo "<button type='button' class='btn btn-warning' onclick='myFunction()'>Not Available</button></td>";
		    }

			//echo "<button class='submit-btn' name='flight' value=".$row1[0].">Book</button>";
			echo "</div>";
			
		}
		echo "</div>";
		//echo "</form>";
	}
		
	?>
</body>
</html>