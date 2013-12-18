<?php
	include("config.php");
	if($_GET["action"]=="insert")
	{

		$res = mysql_query("SELECT * WHERE username = '$username'");
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
			
		$num = mysql_num_rows(mysql_query("SELECT id FROM shopUser WHERE username = '$username'"));
		if($num > 0)
		{
			echo("Fehler");
		} else {
			echo ("funktioniert");
			mysql_query("INSERT INTO shopUser VALUES ('','$username','$passwort','$vorname','$nachname','$wohnort','$plz','$strasse','$hausnummer','$tele','$mail')");
			mail($mail, "Anmeldung im Webshop des Automuseum Mannheim", "Sie haben sich erfolgreich angemeldet. </br></br></br></br> Ihr Benutzername zum Einloggen ist: $username </br> und das 					Passwort ist: $passwort");
		}
	}
?>