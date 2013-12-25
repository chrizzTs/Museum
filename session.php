<?php
	//Dieses Skript überprüft, ob der User-Cookie bereits gesetzt ist. Falls nicht, wird die aktuelle microtime abgerufen und dem User als Identifikation zugewiesen. Sofern nicht zwei User in exakt demselben Moment die Seite aufrufen, was bei einer Museumsseite ein zu vernachlässigendes Szenario ist, sollte das als Merkmal reichen. Der Cookie lässt den Benutzer einen Warenkorb erstellen, ohne, dass er angemledet ist.
	
	if(!isset($_COOKIE["user"]))
	{
		$tmp = md5(microtime());		//abrufen der Zeit
		$duration = 60*60*24;
		setcookie("user", $tmp, time()+60*60*24*29, "/");	//Name des Cookies, Wert, Dauer bis zum Ablauf(knapp 1 Monat), für die gesamte 		Webseite abrufbar
	} else {
		
		echo("");
	}
?>