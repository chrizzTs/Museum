<?php
	include("session.php");
	
	$db_server = "localhost";
	$db_name = "webshop";
	$db_user = "admin";
	$db_passwort = "admin";
	
	$db = mysql_connect($db_server, $db_user, $db_passwort);
	mysql_select_db($db_name);
?>