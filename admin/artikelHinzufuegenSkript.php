<?php
//Dieses Skript kann von einem Admin-User in dem Bereich Shop-Verwaltung aufgerufen werden, nachdem die Schaltfläche "neuen Artikel hinzufüen" betätigt wurde. Es bekommt den Namen und Preis, des neuen Artikels übergeben. Damit generiert es einen neuen Eintrag in der products Tabelle der webshop Datenbank

	include("config.php");	//Baut eine DB-verbindung auf und überprüft, ob der User-Cookie gesetzt ist.


	//Einlesen der Daten

	$name = $_POST["name"];
	$preis = $_POST["preis"];
	
	$result = mysql_query("INSERT INTO products VALUES ('','$name','$preis')");	//Generieren des neuen Tabelleneintrags
	if($result)
	{
		echo"ja";
	} else {
		echo mysql_error();
	}

?>