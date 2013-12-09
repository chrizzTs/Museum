<head>
<meta name="robots" content="noindex">
</head>
<body>

<?php
$empfaenger = "m.wieben@yahoo.de";
$absendername = htmlspecialchars($_POST["name"]);
$absendermail = $_POST["email"];
$betreff = "$absendername will Kontakt aufnehmen";
$eingabe = htmlspecialchars($_POST["eingabe"]);
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

if(!empty($absendername) and !empty($absendermail) and !empty($eingabe) and filter_var($absendermail, FILTER_VALIDATE_EMAIL))
{
mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>");
mail($absendermail, "Ihre Anfrage", $usertext);

echo "<h1>Folgende Daten wurden &uuml;bermittelt.</h1>"
. "<h2><a href=Index.php>Klicken sie hier um zur Startseite zur&uuml;ckzukeren</a></h2>"
. "<table style='border: 1px red solid'>"
. "<tr><th>Ihr Name:</th></tr>"
. "<tr><td>$absendername</td></tr>"
. "<tr><th>Ihre Mailadresse:</th></tr>"
. "<tr><td>$absendermail</td></tr>"
. "<tr><th>Ihre Nachricht an mich:</th></tr>"
. "<tr><td>$eingabe</td></tr>"
. "</table>";
}

else
echo "Eingabe nicht erfolgreich, Versuchen sie es Nocheinmal<meta http-equiv='refresh' content='3; URL=index.html'>";
?>