<?php
//Dieses Skript setzt den "loggedIn" Cookie auf den default-Wert: "no", was bedeutet, dass auf diesem Client derzeit kein User eingeloggt ist. Es wird aus dem Webshop aufgerufen
	setcookie("loggedIn","no",time()+60*60*24*29, "/");
?>