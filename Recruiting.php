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
	



     <p id="replyPost"> </p>

	<div id="recturingForm">
     Wir freuen uns, dass Sie sich bei uns bewerben wollen. Der nächste Schritt ist das Ausfüllen des offiziellen Bewerbungsformulars,
	 das direkt an die Personalabteilung gerichtet ist. Das Beantworten der Fragen dauert nur etwa 20 bis 30 Minuten.	   
	
	    
	 <p>Felder mit * sind Pflichtfelder und müssen ausgefüllt werden.</p>
		<h3>Angaben zu Ihrer Person:</h3>
   <table border="0" id="recturingForm"> 

		
  <tr>
    <td id="lastnameLabel">Nachname*</td>
    <td><p><input id="lastname" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td id="firstnameLabel">Vorname*</td>
    <td><input id="firstname" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Geschlecht</td>
    <td><input id="sex" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Titel</td>
    <td><input id="title" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Nameszusatz</td>
    <td><input id="addname" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td><p>Geburtsdatum (z.B.: 30.07.1983)</p></td>
    <td><input id="birthday" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Geburtsland</td>
    <td><input id="birthcountry" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  <tr>
    <td>Geburtsname</td>
    <td><input id="birthname" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr><tr>
    <td>Staatsangehörigkeit</td>
    <td><input id="nationality" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr><tr>
    <td id="emailLabel">E-Mail Adresse*</td>
    <td><input id="mail" name="name" type="text" size="30" maxlength="30" /></p></td>
  </tr>
  	<td>Familienstand</td>
    <td><input type="radio" id="ledig" name="fam" value="fam"> Ledig<br>
    <input type="radio" id="married" name="fam" value="fam"> 
    Verheiratet</td>
	<tr>
	<td>Zusätzliche Nachricht</td>/>
	<td><textarea id="eingabe" name="eingabe" cols="50" rows="10"></textarea></td>
	</tr>
	<tr>
	<td>Weitere Anhänge:</td>         
     <td><form action="upload.php" class="dropzone"></form></td>
	</tr>
	<tr>
	<td> <input type="button"  id="formApplication" value="Bewerbung absenden"/> </td>
	</tr>
			</form>
	</table>
</div>
 </div>
	</div>
</div>
</body>
</div>
<?php
	include "Footer.php";	//Einbinden Footer
?>