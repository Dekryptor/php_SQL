<?php
session_start();
$username = "username";
$password = "password";
$host = "localhost";
$connect = mysql_connect($host, $username, $password) or die(mysql_error());

$select = mysql_select_db("champions") or die(mysql_error());
?>
