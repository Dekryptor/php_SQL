<?php
session_start();
$username = "bilgine";
$password = "Enis9463527";
$host = "localhost";
$connect = mysql_connect($host, $username, $password) or die(mysql_error());

$select = mysql_select_db("bilgine_champions") or die(mysql_error());
?>
