<?php
require_once('../connect.php');
if($_SESSION['rank']!=Owner)
	die("Only logged Owners can view this page");
?>
<html>
	<head>	
		<title>OwnerHome</title>
		<link rel="stylesheet" href="home.css" />
		<style>
	
		</style>
</head>


	<body>
	

	<head>
	<p id="p1">Welcome to your Company!</p>
	
	<div class="home">
		<div><button type="button"  class="button1" onclick="location.href='users.php'">Users</button></div>
		<div><button type="button"  class="button2" onclick="location.href='inventory.php'">Inventory</button></div>
		<div><button type="button"  class="button3" onclick="location.href='orders.php'">Orders</button></div>
		<div><button type="button"  class="button4" onclick="location.href='../logout.php'">Logout</button></div>
	</div>
	
	</body>
	




</html>