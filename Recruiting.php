<?php
include "Header.php"; // Einbinden Header
?>
<div id="page wrapper">

<head>
<!-- 1 -->
<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
<!-- 2 -->
<script src="dropzone.min.js"></script>>
</head>
 
<body>
<div id="page-wrapper">
	<div id="page" class="container2">
	  <div class="title">
			<h2>Ihre Bewerbung bei uns!</h2>
		</div>
<div id="wrapper" class="container">
	  <p id="replyPost">
      Wir freuen uns, dass Sie sich bei uns bewerben wollen. Der nächste Schritt ist das Ausfüllen des offiziellen Bewerbungsformulars,
das direkt an die Personalabteilung gerichtet ist. Das Beantworten der Fragen dauert nur etwa 20 bis 30 Minuten.	    </p>
	  <p>Ihre Daten werden selbstverständlich streng vertraulich behandelt, nicht an Dritte weitergegeben und nur für die Bewerbung
	    verwendet. Bitte beachten Sie, dass Ihre Daten nur dann an uns gesendet werden, wenn Sie am Ende des Formulars auf
	    „Bewerbung absenden“ klickst.
	    
	    Felder mit * sind Pflichtfelder und müssen ausgefüllt werden. </p>
	  <p><h3>Angaben zu Ihrer Person:</h3>
      
      <table border="0">
  <tr>
    <td>Nachname*</td>
    <td><p><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Vorname*</td>
    <td><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Geschlecht</td>
    <td><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Titel</td>
    <td><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Nameszusatz</td>
    <td><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td><p>Geburtsdatum (z.B.: 30.07.1983)</p></td>
    <td><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Geburtsland</td>
    <td><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Geburtsname</td>
    <td><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr><tr>
    <td>Staatsangehörigkeit</td>
    <td><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr><tr>
    <td>E-Mail Adresse*</td>
    <td><input id="name" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  	<td>Familienstand</td>
    <td><input type="radio" name="fam" value="fam"> Ledig<br>
    <input type="radio" name="fam" value="fam"> 
    Verheiratet</td>
</table>

	</p>
				<p>Zusätzliche Nachricht<br /><textarea id="eingabe" name="eingabe" cols="50" rows="10"></textarea></p>
				<p>Weitere Anhänge:</p>
                
      <form action="upload.php" class="dropzone"></form>
	  <input type="submit" value="Bewerbung absenden"/>
			</form>
		</p>
 </form>
 </div>
	</div>
</div>
</body>
</div>
<?php
	include "Footer.php";	//Einbinden Footer
?>