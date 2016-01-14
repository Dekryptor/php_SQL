<?php
session_start();
session_destroy();
?>
<html>
	<head>
		<title>League of Legends Champion Skins Website</title>
		<link rel="stylesheet" href="logout.css" />
		<style>
		
		body{
		background-image: url('../images/Lollogout.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;		
		}
			
		#h1{
		margin-left: 45%;
		margin-top: 1%;
		text-shadow:1px 1px blue;
		color: white;
		}
		
		#login{
		margin-left: 47%;
		margin-top: 30%;
		font-size: 200%;
		color: #ff0000;
		text-shadow: 2px 2px white;
		
		}
		
		#p1{
		margin-left: 32%;
		text-shadow:1px 1px black;
		color: white;
		font-size: 200%;
		}
		
		</style>
	</head>
	<body>
	<h1 id="h1">Logged out</h1><br/>
	<a href="login.php" id="login" class="logout">Login</a><br />
	<p1 id="p1">Thanks! Get back soon for new skins and prizes!</p1>
	</body>
</html>