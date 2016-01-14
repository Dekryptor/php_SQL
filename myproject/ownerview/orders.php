<?php
require_once('../connect.php');
if($_SESSION['rank']!=Owner)
	die("Only logged Owners can view this page");
		
	$result = mysql_query('SELECT SUM(Price) AS value_sum FROM Orders'); 
	$row = mysql_fetch_assoc($result); 
	$sum = $row['value_sum'];
	//echo $sum;
					
?>


<html>
<head>
	<title>Orders</title>
	<style>
	
	
	
	
	</style>
</head>

<body>
	<form name="myform" method="post">
		<table border="1" id="table">
			<tr>
			<th>User ID</th>
			<th>Order ID</th>
			<th>Profit</th>
			</tr>
	<?php

		$sql = "SELECT * FROM Orders ORDER BY OrderID DESC";
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
						<?php echo $row['OrderID'];?>
					</td>
					<td >
						<?php echo "$".number_format($row['Price'], 2);?>
					</td>
					

					
				</tr>

						
					
		<?php
		}
		?>
	</table>
	
	<button type="button" class="logout" onclick="location.href='../logout.php'">Logout</button>
	<p>Total Profit is:<?php echo $sum;?></p1>
	</form>
	</body>

</html>

