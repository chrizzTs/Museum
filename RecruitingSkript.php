<?php
	//Dieses Skript wird aufgerufen üder die default.js mittels eins jQuery Befehls, sobald der Benutzer die Schaltfläche "Kontaktanfrage versenden" betätigt. Es werden die Daten aus den Eingabeflächen eingelesen und unter den folgenden Variablen zwischengespeichert. Es handelt sich um den Namen, des Buntzers, die E-Mail Adresse und den Inhalt der Anfrage. Als erstes wird eine Mail an den admin versendet und anschließend eine an den User als Bestätigung, dass die Anfrage versandt wurde. Abschließend wird über die default.js dem Benutzer auf der Webseite dynamisch angezeigt, welche Daten versendet wurden.
	
// Daten einlesen	
$empfaenger = "christopher.stumm@trash-mail.com";
$absendername = htmlspecialchars($_POST["name"]);
$absendermail = $_POST["email"];
$betreff = "$absendername will Kontakt aufnehmen";
$firstname = htmlspecialchars($_POST["firstname"]);
$lastname = htmlspecialchars($_POST["lastname"]);
$sex = htmlspecialchars($_POST["sex"]);
$title = htmlspecialchars($_POST["title"]);
$birthday = htmlspecialchars($_POST["birthday"]);
$addname = htmlspecialchars($_POST["addname"]);
$birthname = htmlspecialchars($_POST["birthname"]);
$birthcountry = htmlspecialchars($_POST["birthcountry"]);
$nationality = htmlspecialchars($_POST["nationality"]);
$mail = htmlspecialchars($_POST["mail"]);
$ledig = htmlspecialchars($_POST["ledig"]);

//E-Mail Texte generieren
$text = "Es ist eine Bewerbung eingegangen. Der Bewerber hat folgende Daten angegeben:

        -------------------------------------------------

        $eingabe
		§absendername
		§absendermail
		§betreff
		§eingabe
		§firstname
		§lastname
		§sex
		§title
		§birthday
		§addname
		§birthname
		§birthcountry
		§nationality
		§mail
		§ledig";
        
$usertext = "Sehr geehrte/r Herr/Frau $absendername,
			
			vielen Dank für Ihre Bewerbung. Wir werden diese prüfen und dann umgehend auf Sie zurückkommen.
			
			-----------------------------------------------------------
			
			
			Mit freundlichen Grüßen,
			
			Ihr Automuseum Mannheim Team";

//wenn alle Dateb erfasst wurden wird die Mails letztendlich versendet

mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>");
mail($absendermail, "Ihre Anfrage", $usertext);	


echo  "<p style=\"color: red\">Ihre Bewerbung wurde erfolgreich an uns Versandt.</p>";
?>