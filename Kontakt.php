<?php
	//Diese Seite ermöglicht es dem User, eine Kontaktanfrage durchzuführen. Dafür kann er in den beshrifteten Eingabefeldern seinen Namen, seine Mail-adresse und seine Nachricht angeben. Diese Daten werden dann an das AnfrageSkript.php übergeben und dort ausgewertet bzw. verarbeitet.
	//Darüber hianus besteht für den User die Möglichkeit direkt mit den drei Führungskräften des Museumskontaktaufzunehmen, durch die Schaltflächen, die sich unter dem Formular befinden. Das Betätigen einer der Bereiche öffnet automatisch die Mail-Applikation auf dem Client Rechner und fügt die Empfänger-Mail Adresse der jeweiligen Person sowie den Betreff ein.
	
	include "Header.php"; // Einbinden Header
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
		<!-- Titel der Seite -->
			<h2>Kontaktdaten</h2>
		</div>

		<p id="replyPost">Bei jeglichen Fragen, Anmerkungen oder Anregungen kontaktieren Sie uns bitte gerne. Wir werden umgehend auf Ihr Anliegen eingehen.</p>
	</div>
	
	<!-- Eingabeformular für Name, Mail, und Anfragetext-->
	<div id="wrapper" class="container">
		<form id="kontaktform">
			Ihr Name:<br/>
			<input id="name" name="name" type="text" size="30" maxlength="30" value="Optimus Prime"/><br/>
			Gültige Mail Adresse:<br/>
			<input id="email" name="email" type="text" size="30" maxlength="40"/></br>
			Ihre Nachricht an mich:<br/><textarea id="eingabe" name="eingabe" cols="50" rows="10"></textarea></br>
			<input type="submit" value="Kontaktanfrage versenden"/>
		</form>
	</div>
	
	<!-- Drei Boxen zur direkten und persönlichen Kontaktaufnahme -->
	<div id="wrapper1">
		<div id="three-column" >
		
			<!-- Kontakt mit Christian Mahlich -->
			<div id="tbox1">
				<div class="title">
					<h2>Christian Mahlich</h2>
				</div>
				<p>Lorem ipsum[...]</p>
				<a href="mailto:c.mahlich@gmail.com?Subject=Museumsanfrage"target="_top" class="button">Persönlicher Kontakt</a>
			</div>
			
			<!-- Kontakt mit Christopher Stumm  -->
			<div id="tbox2">
				<div class="title">
					<h2>Christopher Stumm</h2>
				</div>
				<p>Lorem ipsum[...]</p>
				<a href="mailto:christopher@stumms.com?Subject=Museumsanfrage"target="_top" class="button">Persönlicher Kontakt</a> 
			</div>
			
			<!-- Kontakt mit Mattes Wieben -->
			<div id="tbox3">
				<div class="title">
					<h2>Mattes Wieben</h2>
				</div>
				<p>Lorem ipsum[...]</p>
				<a href="mailto:christopher@stumms.com?Subject=Museumsanfrage"target="_top" class="button">Persönlicher Kontakt</a>
			</div>
		</div>
	</div>
</div>

<?php
	include "Footer.php";	//Einbinden Footer
?>