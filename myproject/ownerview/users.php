<?php
require_once('../connect.php');
if($_SESSION['rank']!=Owner)
	die("Only logged Owners can view this page");
?>


<html>
<head>
	<title>Users</title>
	<style>
	
	
	
	
	</style>
</head>

<body>

	<form name="myform" action="cart.php" method="post">

		<table border="1" id="table">
		<p>Here is the registered Users</p>
			<tr>
			<th>User ID</th>
			<th>User Name</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>email</th>
			<th>Zip Code</th>
			</tr>
	<?php

		$sql = "SELECT * FROM Users ORDER BY UserId DESC";
		$query = mysql_query($sql);

		if(!empty($query)) while($row = mysql_fetch_assoc($query))
		{
		$totalprofit = 0;
		?>
			<tr>
					
					<td>
						<?php echo $row['UserId'];?>
					</td>
					<td>
						<?php echo $row['uname'];?>
					</td>
					<td>
						<?php echo $row['fname'];?>
					</td>
					<td>
						<?php echo $row['lname'];?>
					</td>
					<td>
						<?php echo $row['email'];?>
					</td>
					<td>
						<?php echo $row['zip'];?>
					</td>
				

					
				</tr>

						
					
		<?php
		}
		?>
	</table>
	
	<button type="button" class="logout" onclick="location.href='../logout.php'">Logout</button>
	</form>
	</body>

</html>
