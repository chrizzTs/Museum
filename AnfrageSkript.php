<?php
$empfaenger = "matswn77@gmail.com";
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
mail($absendermail, "Ihre Anfrage", $usertext);		//joooooooolkasndlkasndlkasndklasndklnasldnaslkdnkl

echo "<div style='border: 1px red solid'>"
. "<b>Ihr Name: </b><br/>"
. "$absendername <br/>"
. "<b>Ihre Mailadresse: </b><br/>"
. "$absendermail <br/>"
. "<b>Ihre Nachricht an mich: </b><br/>"
. "$eingabe <br/>"
. "</div>";

}

else
echo  "<p style="color: red">Eingabe nicht erfolgreich, Versuchen sie es Nocheinmal</p>";
?>