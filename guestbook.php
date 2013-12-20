<?php
	$title = "Kontakt";
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Gästebuch</h2>
		</div>
	</div>
	
	<div id="wrapper" class ="container">
		<div id="two-column">
			<div>
			<p id="replyGuestbookEntry"></p>
			<form id="guestbookForm">
			<table>
				<tr>
					<td>Name: </td> 
					<td><input  type="text" size="62" name="name" placeholder="Max Muster"><td>
				</tr>
				<tr>
					<td>E-Mail:</td>
					<td> <input  type="text" size="62" name="email" placeholder="max@muster.de"></td>
				</tr>
				<tr>
					<td>Eintrag:</td>
					<td><textarea value"Ihr Eintrag" name="eingabe" 
						placeholder="Bitte 	geben Sie Ihren Gästebucheintrag ein." cols="45" rows="12"></textarea> </td>
				</tr>
			</table>
			<input id="submit" type="submit"value="Eintrag veröffentlichen">
			</form>

			</div>
			
			<div>
			<p id="col2Entries"></p>
			</div>
		</div>
	</div>
</div>
	
<?php
	include "Footer.php";
?>