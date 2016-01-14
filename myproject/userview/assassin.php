<?php
require('connect.php');
//require('../logininfo.php');
?>
<html>
<head>
	<title>Assassin</title>
	<style>
	
	body{
	background-image: url('images/aback.jpg');
	background-repeat: no-repeat;
	overflow-x:hidden;
	background-size: cover;
	background-position: center;
	font-family:verdana;
	color:#FF3300;
	}
	
	#table{
	font-style:italic;
	font-size:120%;
	}
	
	input[type="text"] {
	height: 30px;
	width: 70px;
	font-size: 25px;
	}
	
	button[type=submit] {
    height: 20px;
    width: 30em;
    margin-left: 77%;
	}
	
	</style>
</head>

<body>
	<form name="myform" action="cart.php" method="post">
		<table border="1" id="table">
	<?php

		$sql = "SELECT * FROM skins WHERE category = 'assassin'";
		$query = mysql_query($sql);
		if(!empty($query)) while($row = mysql_fetch_assoc($query))
		{
		?>
			<tr>
					
					<td>
						<img width="200px" height="200px" src="images/<?php echo $row['ID']; ?>.png">
					</td>
					<td>
						<?php echo $row['name'];?>
					</td>
					<td>
						<?php echo $row['description'];?>
					</td>
					<td >
						<?php echo "$".number_format($row['price'], 2);?>
					</td>
					
					<td id="box">
						<input type="text" name="<?php echo $row['ID'];?>" size="5"/>
					</td>
				</tr>
		
		<?php
		}
		?>
	</table>
	<button type="submit" name="add">ADD to CART!</button> 
	</form>
	</body>

</html>