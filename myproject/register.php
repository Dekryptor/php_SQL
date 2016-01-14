<?php
require("connect.php");

if(isset($_SESSION['rank']))
{
	$rank = $_SESSION['rank'];
	if($rank == "user")
		header("Location: userview/home.php");
	else if($rank == "owner")
		header("Location: ownerview/home.php");
	else if($rank == "admin")
		header("Location: adminview/home.php");
	else
		header("Location: guestview/home.php");
}
if(isset($_POST['submit']))
{
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$zip = $_POST['zip'];
	$verify = $_POST['confirm'];
	
	if( !($uname && $password && $verify && $fname && $lname ) )
		die('Alert: Not all fields were filled out.');
	if(strlen($uname) > 15)
		die('Error: Username must be less than 15 characters');
	if(mysql_num_rows(mysql_query("SELECT uname FROM Users WHERE uname = '".$uname."'")) > 0)
		die('Error: Username already exists in the system.');
	if($password != $confirm)
		die('Error: The passwords do not match.');
	if(strlen($fname) > 15)
		die('Error: The first name must be less than 15 characters long.');
	if(strlen($lname) > 15)
		die('Error: The last name must be less than 15 characters long.');
	if(strlen($zip) != 5 )
		die('Error: The zip code must be 5 digits in length');
	//all is well, register customer!
	$password = md5($password);
	//echo $password;
	mysql_query("INSERT INTO `Users` (`UserId`, `uname`, `password`, `fname`, `lname`, `email`, `zip`) VALUES (NULL, '$uname', '$password', '$fname', '$lname', '$email', '$zip')") or die(mysql_error());
	echo('Registration Successful, Welcome new member! You can now login to your new account.<br /><a href="login.php">Click here to login</a>');
}
else
{
	?>
	<html>
	<head>
		<title>**Registration**</title>
		<link rel="stylesheet" href="register.css" />
		<style>
		body{
			background-image: url('../images/register.jpg');
			background-repeat: no-repeat;
			overflow-x:hidden;
			background-size: cover;
			background-position: center;
			font-family:verdana;
			color:#330099;
			}
			
		#t1 {
  			width:23%;
  			height:180px;
  			margin:30px auto;
  			padding: 10px 5px;
  			background-color:#ffffff;
  			border:1px solid black;
  			opacity:0.8;
  			filter:alpha(opacity=60);
  			}
  		#h{
  			width:30%;
  			//height:180px;
  			//margin:30px auto;
  			padding: 10px 5px;
  			background-color:#ffffff;
  			border:1px solid black;
  			opacity:0.8;
  			filter:alpha(opacity=60);
  			}
		#reg{
			color:#FFFFFF;
			}
			
		</style>
	</head>
	<body>
	<center><h1 id="h">Register new User</h1></center>
	<form action="register.php" method="POST" id="not-t1">
	<table width = 100% align="center" id="t1">
		
		<tr>
			<td align="right">First Name</td>
			<td><input type="text" name="fname" /></td>
		</tr>
		<tr>
			<td align="right">Last Name</td>
			<td><input type="text" name="lname" /></td>
		</tr>
		<tr>
			<td align="right">Username</td>
			<td><input type="text" name="uname" /></td>
		</tr>
		<tr>
			<td align="right">Password</td>
			<td><input type="text" name="password" /></td>
		</tr>
		<tr>
			<td align="right">Confirm Password</td>
			<td><input type="text" name="confirm" /></td>
		</tr>
		<tr>
			<td align="right">email</td>
			<td><input type="text" name="email" /></td>
		</tr>
		<tr>
			<td align="right">Zip Code</td>
			<td><input type="text" name="zip" /></td>
		</tr>
		
	</table>
	<center><input type = "submit" name = "submit" value = "Register Now" class="button"></center>
	</form>
	</body>
	</html>
	<center><a href = "login.php" id="reg" class="button">Login Page</a></center>
	<?php
}
?>