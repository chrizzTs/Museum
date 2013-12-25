<?php
// Dieses Skript ruft alle Artikel aus der Datenbank ab und gibt aus, wie viele Einträge sich dort befinden. Das wird für einige Methoden aus der default.js benötigt

	include("config.php");		//Baut eine DB-verbindung auf und überprüft, ob der User-Cookie gesetzt ist.
	$res = mysql_query("SELECT * FROM products");	//Abfrage
	
	$num = mysql_num_rows($res);	//Zählen der DB-Einträge
	
	echo "$num";
?>