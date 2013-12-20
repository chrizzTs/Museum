<?php
	$title = "Kontakt";
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Kontaktdaten</h2>
		</div>

		<p id="replyPost">Bei jeglichen Fragen, Anmerkungen oder Anregungen kontaktieren Sie uns bitte gerne. Wir werden umgehend auf Ihr Anliegen eingehen.</p>
	</div>
	
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
	

	<div id="wrapper1">
		<div id="three-column" >
			<div id="tbox1">
				<div class="title">
					<h2>Christian Mahlich</h2>
				</div>
				<p>Lorem ipsum[...]</p>
				<a href="mailto:c.mahlich@gmail.com?Subject=Museumsanfrage"target="_top" class="button">Persönlicher Kontakt</a>
			</div>
			
			<div id="tbox2">
				<div class="title">
					<h2>Christopher Stumm</h2>
				</div>
				<p>Lorem ipsum[...]</p>
				<a href="mailto:christopher@stumms.com?Subject=Museumsanfrage"target="_top" class="button">Persönlicher Kontakt</a> 
			</div>
			
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
	include "Footer.php";
?>