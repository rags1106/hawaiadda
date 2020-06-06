
<?php
$message="";
if(!empty($_POST["email"]))
{
	require 'connect.php';

	if($_POST['password']==$_POST['confirm_password'])
	{
		$query   = "INSERT into register (username,password) VALUES('$_POST[email]','$_POST[password]')";
		$result = pg_query($query);
		if(!$result) 
		{
      		echo pg_last_error($db);
   		} 
   		else 
   		{
    		header('location: signin.php');
   		}
	}
	else
	{
		$message = "!Password & confirm password should be same";
	}
	pg_close($db);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="checkUser.js"></script>



<title>Sign-up</title></title>

<style>
.message{
	color: red;
}
body{
  background: url(images/airline1.jpg);
  background-repeat: no-repeat;
  background-size: auto;
}
.body-in{
  margin: 0;
  height: auto;
  position: absolute;
  top:10%;
  bottom: auto;
  left: 25%;
  right: 25%;
}    

form {
  border: none;
  background: rgba(0, 0, 0, 0.7);
  border-radius: 6px;
  font-family: Arial, Helvetica, sans-serif;
  display: inline-block;
  width: auto;
  height: auto;
  margin: auto;
}

* {
  box-sizing: border-box;
}


.form-control {
  background-color: #fff;
  height: 50px;
  color: #191a1e;
  border: none;
  font-size: 16px;
  font-weight: 400;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 40px;
  padding: 0px 25px;
}
.form-label {
  display: block;
  margin-left: 20px;
  margin-bottom: 5px;
  font-weight: 400;
  text-transform: uppercase;
  line-height: 24px;
  height: 24px;
  font-size: 12px;
  color: #fff;
}

/* Add padding to containers */
.container {
  padding: 16px;
  margin: auto;
}

/* Full-width input fields */


input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=email] {
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for the submit button */
.submit-btn {
  color: #fff;
  background-color: #f23e3e;
  padding: 14px 20px;
  margin: 8px 0;
  font-weight: 400;
  cursor: pointer;
  height: 50px;
  font-size: 14px;
  border: none;
  width: 100%;
  border-radius: 40px;
  text-align: center;
  text-transform: uppercase;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
  opacity: 0.8;
}
/* Add a hover effect for buttons */
button:hover {
  opacity: 1.0;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 18%;
  border-radius: 50%;
  border: 2px solid white;
  background-color: white;  
}

a:link {
  color: red;
}

/* visited link */
a:visited {
  color: red;
}

/* mouse over link */
a:hover {
  color: hotpink;
}

.signin {
  padding: 5px; 
  text-align: center;
  color: white;
}

</style>

</head>	
<body>
<div class="body-in">
  <form action="" method="post">
    <div class="container">
    	<div class="imgcontainer">
      		<img src="images/businessman.png" alt="Avatar" class="avatar">
    	</div>
        <div class="signin"><h1>Register</h1></div>

        <label for="email" class="form-label"><b>Email</b></label>
        <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>

        <!--Checking for username availability-->
        <div>
        <input type="button" id="check_username_availability" value="Check Availability">
        <div id="username_availability_result"></div>
        </div>

        <label for="psw" class="form-label"><b>Password</b></label>
        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="" required>

        <label for="psw-repeat" class="form-label"><b>Confirm Password</b></label>
        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" value="" required>

        <div class="message"><strong><?php if($message!="") { echo $message; } ?></strong></div>
      
        <button type="submit" class="submit-btn">Register</button>
    </div>  
    
    <div class="signin">
      <p>Already have an account? <a href="signin.php">Sign in</a>.</p>
    </div>
  </form>
</div>
</body>
</html>
