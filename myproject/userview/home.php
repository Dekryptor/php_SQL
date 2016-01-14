<?php
require_once('../connect.php');
if($_SESSION['rank']!=User)
	die("Only logged Users can view this page");
?>
<html>

<head>
<title> User HomePage </title>


<script src="jquery.js"></script>

<script>
		


jQuery(document).ready(function() {
		jQuery("#slider li").not(":first").css("display", "none");
	
		var index = 0;
		var count = 5;
	
		jQuery("#next").click(function() {
		index++;
		index=index%count;
		show_slide(index);
		});
	
		jQuery("#previous").click(function(){
		index--;
		index=index%count;
		show_slide(index);
		});
	
		function show_slide(i) {
			jQuery('#slider li').css("display", "none");
			jQuery('#slider li:eq(' + i + ')').css("display", "block");
		
		}
		});	
			
</script>


<link rel="stylesheet" href="home.css" />

<style>

body 
{

background-image: url(http://na.leagueoflegends.com/sites/default/files/styles/scale_xlarge/public/upload/ps4_article_banner.jpg?itok=rzuXLV2f);
background-repeat: no-repeat;
background-size: cover;
background-position: center;
}

#previous{position:absolute; left:300px; top:450px}
#next{position:absolute; left:350px; top:450px}
#slider{position:absolute; top:200px; left:200px}
ul.nav{position:absolute; top:150px; left:750px; right:250px}

</style>


</head>

 <body>

 
  <div class="nav">
    <li><a href="../logout.php" class="red">LOGOUT</a></li>
<div>

 <ul id="slider">
 
 		<li><a href="fighter.php"><img src="fighter.png"/><a/></li>
		<li><a href="tank.php"><img src="tank.png"/></a></li>
 		<li><a href="assassin.php"><img src="assassin.png"/></a></li>
 		<li><a href="mage.php"><img src="mage.jpg"/></a></li>
 		<li><a href="marksman.php"><img src="marksman.png"/></a></li>

 </ul>	
 
 
 
  <a id="previous" href="#"><image border="0" src="arrowleft.png" width="32" height="32"></a>
  <a id="next" href="#"><image border="0" src="arrowright.png" width="32" height="32"></a>


 
 
 </body>





</html>

