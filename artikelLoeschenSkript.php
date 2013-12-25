<?php
//Dieses Skript kann von einem Admin-user in dem Bereich Shopverwaltung aufgerufen werden, nachdem die Schaltfläche "ausgewählte Artikel löschen" betätigt wurde. Alle Artikel, deren Checkbox angehakt sind, werden mittels Javascript in der default.js ausgewertet und in dieses Skript nacheinander zum Löschen übergeben. Es sind also mehrere Aufrufe notwendig.


	include("config.php");		//Baut eine DB-verbindung auf und überprüft, ob der User-Cookie gesetzt ist.
	
	$name = $_POST["name"];
	
	$result = mysql_query("DELETE FROM products WHERE name='$name'");
	
	if($result)
	{
		echo("ja");
	} else {
		echo mysql_error();
	}
?>