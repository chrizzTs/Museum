<?php
	include "config.php";
	$username = $_POST["username"];
	$passwort = $_POST["passwort"];
	
		
	$res = mysql_query("SELECT passwort FROM shopUser WHERE username = '$username'");
	$menge = mysql_num_rows($res);
	$data = mysql_fetch_assoc($res);
	
	if($menge==0)
	{
		echo "Es wurde kein Benutzer mit diesem Namen gefunden.";
	} else if ($passwort != $data["passwort"])
	{
		echo "Es wurde das falsche Passwort eingegeben";
	} else {
		echo "Willkommen".$data["nachname"];
	}
?>