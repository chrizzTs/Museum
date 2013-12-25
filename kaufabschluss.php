<?php
// Dieses Skript führt den Kaufabschluss des Users durch und wird durch die Schaltfläche "Kaufen" aus dem Warenkorb aufgerufen. Dazu wird als erstes der loggedIn Cookie des Users abgefragt um zu überprüfen, welcher der Benutzer auf dem Client eingeloggt ist und seinen Kauf abschließen möchte. Falls der Wert="no" ist, also kein User auf diesem Client eingeloggt ist, ist die Schaltfläche, die dieses Skript aufgeruft ausgegraut und das Skript kann nicht nur manuelle und ohne Auswirkungen gestartet werden. Danach wird der Warenkorb des angemeldeten Benutzers aus der Warenkorb-Tabelle abgerufen und der Gesamtbetrag berechnet. Anschließend werden die Werte aus der Warenkorb-Tabelle gelöscht und in die verkauft-Tabelle geschrieben.
include("config.php");	//Aufbau der DB-Verbindung und Überprüfen des User-Cookies. Abschließend wird eine Mail generiert und dem Käufer zugesendet.
include "Header.php";	//Einbinden des Header

?>

<div id="page-wrapper">
	<div id="page" class="container">
		<!-- Titel der Seite -->
		<div class="title">
			<h2>Vielen Dank für Ihren Einkauf!</h2>
		</div>
		<p>Das Team des Automuseums Mannheim sagt Danke! </br>
			<a href ="index.php"> Kehren Sie zur Museumsseite zurück</a>
		</p>
	</div>
</div>
<?php
	//Cookie überprüfen
	$sid = $_COOKIE["loggedIn"];
	
	if($sid != "no")
	{
		//Abfrage des Warenkorbs
		$result = mysql_query("SELECT * FROM warenkorb WHERE sid = '$sid'");
		
		//Berechnen des Warenkorbwertes
		$betrag = 0;
		while($row = mysql_fetch_assoc($result))
		{
			$betrag += $row["menge"]*$row["preis"];
		}
		
		//Einfügen in die verkauft Tabelle und löschen aus der Warenkorb Tabelle
		if(!mysql_query("INSERT INTO verkauft VALUES ('', '$sid', '$betrag', 'FALSE')")) echo mysql_error();
		mysql_query("DELETE FROM warenkorb WHERE sid = '$sid'");
		
		// Abfragen der Mail-Adresse aus der shopUser Tabelle
		$result = mysql_query("SELECT email FROM shopUser WHERE username = $sid");
		$mail = mysql_fetch_assoc($result);
		
		//Generieren und versenden der Mail
		$message = "Hallo $sid,
		
		Vielen Dank Ihren deinen Einkauf im Webshop des Automuseums Mannheim. Wir bitten dich den Betrag von:
		
		$betrag
		
		auf folgendes Konto zu überweisen:
		
		Inhaber
		Kontonr.
		BLZ
		
		Viel Spaß mit Ihrem Einkauf,
		
		Das Team des Automuseums Mannheim";
		
		
		mail($mail, "Ihr Einkaufe im Automuseum Mannheim", $message);
	}
	?>
<?php

include "Footer.php";	//Einbinden des Footer

?>