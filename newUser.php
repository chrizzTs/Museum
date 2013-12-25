<?php
//Dieses Skript wird aus der feault.js aufgerufen, nachdem ein User die Schaltfläche "Registrieren" im Bereich webshop betätigt hat. Es legt einen neuen Eintrag in der Tabelle shopUser an. Dazu werden zunächst die übergebenen Daten eingelesen. Anschließend wird das Passwort gesalted und der SHA-512 Hash gebildet. Wenn noch kein User mit dem eingegebenen Namen vorhanden ist, wird er angelegt, ansonsten wird der Fehler in der default.js behandelt. Zuletzt wird dem User eine Mail mit seinem Benutzernamen und Passwort zugesendet.

	include("config.php");		// baut DB-Verbindug auf und überprüt, ob der User-Cookie gesetzt ist.
	if($_GET["action"]=="insert")	//überprüft, welche Aktion des Skripts aufgerufen werden soll, hier kann später ggf. etwas ergänzt weden
	{
		$secret = "superMegaTopSecret";	//zum "salten" des Passworts
		
		// Einlesen der Datan
		$vorname = $_POST["vorname"];
		$nachname = $_POST["nachname"];
		$username = $_POST["username"];
		$passwort = $_POST["passwort"];
		$wohnort = $_POST["wohnort"];
		$plz = $_POST["plz"];
		$strasse = $_POST["strasse"];
		$hausnummer = $_POST["hausNr"];
		$mail = $_POST["mail"];
		$tele = $_POST["tele"];
	
		// Verschlüsseln und hashen des Passworts
		$passwort = $secret.$passwort;
		$passwort = hash('sha512',$passwort);
		
		//Überprüfen ob ein Benutzer mit demselben Namen bereits existiert	
		$num = mysql_num_rows(mysql_query("SELECT id FROM shopUser WHERE username = '$username'"));
		if($num > 0)
		{
			//Fehler --> Nutzername ist bereits vergeben
			echo("Fehler");
		} else {
			//Neuer Nutzer wird angelegt
			mysql_query("INSERT INTO shopUser VALUES ('','$username','$passwort','$vorname','$nachname','$wohnort','$plz','$strasse','$hausnummer','$tele','$mail')");
			
			//Mail wird versendet
			$mailText = "Sie haben sich erfolgreich angemeldet. </br></br></br></br> Ihr Benutzername zum Einloggen ist: $username </br> und das 					Passwort ist: $passwort";
			$mailBetreff = "Anmeldung im Webshop des Automuseum Mannheim";
			mail($mail, $mailBetreff, $mailText);
			
			echo ("funktioniert");
		} //if- $num>0
	}	// if-GET[action]
?>