<?php
	$title = "Kontakt";
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Gästebuch</h2>
		</div>
	<div id="two-column" class="container">
			<div id="tbox1">
			<form action="demo_keygen.asp" method="get">
				Name: <input  type="text" name="name" placeholder="Max Muster"> </br>
				E-Mail: <input  type="text" name="email" placeholder="max@muster.de"> </br>
				Eintrag: <textarea value"Ihr Eintrag" name="post" cols="50" rows="10" placeholder="Bitte geben Sie Ihren Gästebucheintrag ein."></textarea> </br>

			<input id="newEntry" type="submit"value="Eintrag veröffentlichen">
			</form>
			</div>
			
			<div id="tbox2">
			dfdfd
			 <input type="button" onclick="getGuestBookEntries()" value="transparenz" />;
			</div>
	</div>
	</div>
</div>

<script src = "js/default.js"> </script>
	
<?php
	include "Footer.php";
?>