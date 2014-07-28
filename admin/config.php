<?php
// Dieses Skript wird immer dann aufgerufen, wenn eine Datenbankverbindung zur Webshop-Datenbank hergestellt werden soll.

	include("session.php"); // setzt einen Cookie, der den User identifiziert. Wird vor allem vom Webshop benötigt, wenn der User nicht 							angemeldet ist.
	
	$db_server = "localhost";	//gibt an, wo die Datenbank liegt
	$db_name = "webshop";		//gibt an, wie die Datenbank heißt
	$db_user = "admin";			//gibt an, welcher User sich anmeldet
	$db_passwort = "admin";		//gibt an, was das Passwort des Users ist
	
	$db = mysql_connect($db_server, $db_user, $db_passwort);	//Aufbau der Verbindung
	mysql_select_db($db_name);									//Auswahl der Datenbank
?>