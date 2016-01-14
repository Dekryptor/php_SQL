<?php
require_once("connect.php");
//require_once("../logininfo.php");
//print_r($_SESSION);
$UserId = $_SESSION["UserId"];


	
foreach ($_POST as $SkinID=> $quantity) {
		if ($SkinID != "add" && $quantity > 0) {	

			
			$result=mysql_query("SELECT price FROM skins WHERE ID in ('$SkinID') ");

			while($row = mysql_fetch_array($result)){
			$price = $row['price'];
			
			$update = "UPDATE skins SET `quantity` = (`quantity` - ".$quantity.") WHERE `ID` = ".$SkinID."";
			mysql_query($update);
			
			
			
			$subtotal = $row['price']*$quantity;
			$total +=$subtotal;
    		}
    		$query = "INSERT INTO Orders (UserId, OrderID, Price) VALUES (". $UserId .", DEFAULT, " . $total . ")";
    		
			$_SESSION['query'] = "$query";
			$_SESSION['total'] = "$total";
		}
		
		
	}
	

	

if(isset($_POST['checkout'])){
$query = $_SESSION['query'];
//echo "ORDER HAS BEEN PLACED!!";
//echo $query;
$total = $_SESSION['total'];
//echo gettype($query);
mysql_query($query);
session_destroy();
header('Location: checkedout.php');


}





?>

<html>
	<body>
	<form method="post" action="cart.php">	
		<h1>
			Total Price:<?php echo "$".number_format($total, 2);?>
		</h1>
	<br/>
	<button type="submit" name="checkout">Checkout!</button> 

	
	
	
	</form>
	</body>
</hmtl>




