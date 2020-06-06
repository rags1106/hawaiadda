<?php error_reporting(0); ?>
<?php
session_start();
?>
<html>
<head>
	<h2>WELCOME TO HAWAI ADDA</h2>
</head>
<body>

<?php
if($_SESSION["name"]) {
?>
Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="signout.php" tite="Logout">Logout.
<?php
}
else
{
	echo "<h3>Please login first .</h3>";
?>
<a href="signin.php" tite="Login">login
<?php
}
?>
</body>
</html>