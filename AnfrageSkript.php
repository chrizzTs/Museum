<?php
	//Dieses Skript wird aufgerufen üder die default.js mittels eins jQuery Befehls, sobald der Benutzer die Schaltfläche "Kontaktanfrage versenden" betätigt. Es werden die Daten aus den Eingabeflächen eingelesen und unter den folgenden Variablen zwischengespeichert. Es handelt sich um den Namen, des Buntzers, die E-Mail Adresse und den Inhalt der Anfrage. Als erstes wird eine Mail an den admin versendet und anschließend eine an den User als Bestätigung, dass die Anfrage versandt wurde. Abschließend wird über die default.js dem Benutzer auf der Webseite dynamisch angezeigt, welche Daten versendet wurden.
	
// Daten einlesen	
$empfaenger = "matswn77@gmail.com";
$absendername = htmlspecialchars($_POST["name"]);
$absendermail = $_POST["email"];
$betreff = "$absendername will Kontakt aufnehmen";
$eingabe = htmlspecialchars($_POST["eingabe"]);

//E-Mail Texte generieren
$text = "Hallo Master
        $absendername will dir etwas sagen.
        Wenn du mit ihm/ihr Kontakt aufnehmen
        möchtest, benutze bitte die Adresse $absendermail.
        $absendername hat Folgende Nachricht hinterlassen:

        -------------------------------------------------

        $eingabe";
        
$usertext = "Sehr geehrte/r Herr/Frau $absendername,
			
			vielen Dank, dass Sie mit uns Kontakt aufgenommen haben! Wir werden Ihre Anfrage sobald wie möglich beantworten!
			Untenstehend sehen Sie die an uns versandte Nachricht:
			
			-----------------------------------------------------------
			
			$eingabe
			
			
			Mit freundlichen Grüßen,
			
			Ihr Automuseum Mannheim Team";

//wenn alle Dateb erfasst wurden wird die Mails letztendlich versendet
if(!empty($absendername) and !empty($absendermail) and !empty($eingabe) and filter_var($absendermail, FILTER_VALIDATE_EMAIL))
{
mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>");
mail($absendermail, "Ihre Anfrage", $usertext);	

//verändern der Webseite die Daten werden in der default.js abgefangen
echo "<div style='border: 1px red solid'>"
. "<b>Ihr Name: </b><br/>"
. "$absendername <br/>"
. "<b>Ihre Mailadresse: </b><br/>"
. "$absendermail <br/>"
. "<b>Ihre Nachricht an mich: </b><br/>"
. "$eingabe <br/>"
. "</div>";

}

else	//falls Eingaben fehlerhaft sind.
echo  "<p style=\"color: red\">Eingabe nicht erfolgreich, Versuchen sie es Nocheinmal</p>";
?>