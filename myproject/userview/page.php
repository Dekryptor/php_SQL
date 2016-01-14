<?php


public function checkLogin($name)
	{
		session_start();
		require('../connect.php');

		//check cookie
		if($_SESSION['rank'] != $name)
			return false;
		else
			return true;
	}
	
	
?>