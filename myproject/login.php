<?php
require('connect.php');


if(isset($_SESSION['rank']))
{
	$rank = $_SESSION['rank'];
	if($rank == "User")
		header("Location: userview/home.php");
	if($rank == "Admin")
		header("Location: adminview/home.php");
	if($rank == "Owner")
		header("Location: ownerview/home.php");
}


if(isset($_POST['submit']))
{
	$uname = $_POST['uname'];
	$pass = $_POST['password'];
	if( !($uname && $pass) )
		die("Error: You must enter both username and password before logging in.");

	$pass = md5($pass);
	
	$get_user = mysql_query("SELECT * FROM Users WHERE uname = '".$uname."' AND password = '".$pass."'");
	$q = mysql_fetch_object($get_user);
	if(!$q)
	{
		$get_user = mysql_query("SELECT * FROM Admins WHERE uname = '".$uname."' AND password = '".$pass."'");
		$q = mysql_fetch_object($get_user);
		if(!$q)
		{
			$get_user = mysql_query("SELECT * FROM owners WHERE uname = '".$uname."' AND password = '".$pass."'");
			$q = mysql_fetch_object($get_user);
			if(!$q)
			{
				echo $pass;
				die("Login Failure: That username and password combination does not exist in our database.");
				
			}
			else
			{
				$_SESSION['rank'] = "Owner";
				$_SESSION['OwnerId'] = $q->OwnerId;
				session_write_close();
				header("Location: ownerview/home.php");
			}
		}
		else
		{
			$_SESSION['rank'] = "Admin";
			$_SESSION['AdminId'] = $q->AdminId;
			session_write_close();
			header("Location: adminview/home.php");
			}
		}
	else
	{
		$_SESSION['rank'] = "User";
		$_SESSION['UserId'] = $q->UserId;
		session_write_close();
		header("Location: userview/home.php");
	}
}

?>

<html>
	<head>	
		<title>Champions</title>
		<link rel="stylesheet" href="login.css" />
		<style>
			body {
				background-image: url('../images/Login.jpg');
				background-repeat: no-repeat;
				background-size: cover;
				background-position: center;
				
				color:white;
				font-size:16px;
				font-size:150%;
			}
			
		
			#myform
			{
			margin-left:20%;
			margin-top:10%;
			text-shadow:1px 1px red;
			}
			
			
			#p1
			{
			font-size: 30px;
			color: C0C0C0;
			display: inline;
			margin-left: 30%;
			text-shadow:2px 2px #FF0000;
			}
			#div1
			{
			position: absolute;
			margin-left: 25%;
			margin-top: 10px;
			}
			
		
		</style>
</head>


	<body>
	

	<p id="p1">Welcome to the League of Champions</p>
	</head><br /><br />
	<form id="myform" name="login" method="post" action="login.php">
		<div id="name"><label>UserName</label><input type="text" name="uname"></div><br>
		<div id="password"><label>Password</label><input type="password" name="password"></div><br>
		<input type="submit" value="Submit" name="submit" class="submit">
	</form>
	<div id="div1" class="login">
		<button type="button" id="blue" class="blue" onclick="location.href='register.php'">Register Now!</button>
	
	</div>
	</body>
	




</html>

	

