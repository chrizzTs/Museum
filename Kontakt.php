<?php
	$title = "Kontakt";
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Kontaktdaten</h2>
		</div>
		<p>Bei jeglichen Fragen, Anmerkungen oder Anregungen kontaktieren Sie uns bitte gerne. Wir werden umgehend auf Ihr Anliegen eingehen.</p>
		<p> 
			<form action="/AnfrageSkript.php" method="post">
				<p>Ihr Name:<br /><input name="name" type="text" size="30" maxlength="30" value="Optimus Prime"/></p>
				<p>Gültige Mail Adresse:<br /><input name="email" type="text" size="30" maxlength="40"/></p>
				<p>Ihre Nachricht an mich:<br /><textarea name="eingabe" cols="50" rows="10"></textarea></p>
				<input type="submit" value="Kontaktanfrage versenden"/>
			</form>
		</p>
 </form>
	</div>
</div>
<div id="wrapper">
	<div id="three-column" class="container">
		<div><span class="arrow-down"></span></div>
		<div id="tbox1">
			<div class="title">
				<h2>Christian Mahlich</h2>
			</div>
			<p>Lorem ipsum[...]</p>
			<a href="mailto:c.mahlich@gmail.com?Subject=Museumsanfrage"target="_top" class="button">Pers&ouml;nlicher Kontakt</a> </div>
		<div id="tbox2">
			<div class="title">
				<h2>Christopher Stumm</h2>
			</div>
			<p>Lorem ipsum[...]</p>
			<a href="mailto:christopher@stumms.com?Subject=Museumsanfrage"target="_top" class="button"></a>Pers&ouml;nlicher Kontakt </div>
		<div id="tbox3">
			<div class="title">
				<h2>Mattes Wieben</h2>
			</div>
			<p>Lorem ipsum[...]</p>
			<a href="mailto:christopher@stumms.com?Subject=Museumsanfrage"target="_top" class="button">Pers&ouml;nlicher Kontakt</a> </div>
	</div>
</div>
<?php
	include "Footer.php";
?>