<?php
//Dieses Skript ermöglicht dem User einen Login. Es wird über die default.js aufgerufen, sobald der User die "Login" Schaltfläche im Login Bereich betätigt. Dazu bekommt es die eingegebenen Daten des Users übergeben. Aus der shopUser-Tabelle wird das Passwort des Users mit dem eingegeben Usernamen abgerufen. Außerdem wird das eingegeben Passwort auf die gleiche Art wie bei der Registrierung gesalted und mit dem SHA-512 gehasht. Falls kein Nutzer mit mit dem eingegebenen Namen gefunden wird, wird diese Aussage an die die default.js zurückgegeben. Andernfalls wird das Passwort validiert. Wenn es korrekt ist, wird der loggedIn-Cookie dementsprechend gesetzt und der Warenkorb, der bisher unter dem Wert des User-Cookies gespeichert wurde, diesem Nutzer zugeschrieben. Außerdem wird die Bestätigung an die default.js zurückgegeben.

	include "config.php";	//Aufbauen der DB-Verbindung und überprüfen des User-Cookies
	
	//Einlesen der Werte
	$secret = "superMegaTopSecret";
	$username = $_POST["username"];
	$passwort = $_POST["passwort"];
	
	//Abfragen des Passworts aus der shopUser Tabelle
	$res = mysql_query("SELECT passwort FROM shopUser WHERE username = '$username'");
	$menge = mysql_num_rows($res);
	$data = mysql_fetch_assoc($res);
	
	//Bearbeiten des eingegebeben Passworts
	$passwort = $secret.$passwort;
	$passwort = hash('sha512',$passwort);
	
	if($menge==0)
	{
		//Kein User unter eingegebenem Namen gefunden
		echo "Es wurde kein Benutzer mit diesem Namen gefunden.";
	} else if ($passwort != $data["passwort"])
	{
		//Falsches Passwort eingegeben
		echo "Es wurde das falsche Passwort eingegeben";
	} else {
		//User gefunden, Passwort richtig --> Login
		setcookie("loggedIn","$username",time()+60*60*24*29, "/");
		
		//Falls schon vorher Artikel in den Warenkorb gelegt wurden, werden diese nun dem eingeloggten Nutzer zugeschrieben
		$sid = $_COOKIE["user"];
		$num = mysql_num_rows(mysql_query("SELECT * FROM warenkorb WHERE sid ='$sid'"));
		if($num>0)
		{
			mysql_query("UPDATE warenkorb Set sid='$username' WHERE sid='$sid'");
		}
		
		//Rückgabe der Bestätigung
		echo "Willkommen".$data["nachname"];
	}
?>