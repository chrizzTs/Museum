<?php
	$title = "Kontakt";
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container2">
		<div class="title">
			<h2>Gästebuch</h2>
		</div>
		
	<table id="guenstbookTable">
	<tr><td>
	<p id="replyGuestbookEntry"></p>
		<form id="guestbookForm">
			<table>
				<tr>
					<td>Name: </td> 
					<td><input  type="text" size="30" name="name" placeholder="Max Muster"><td>
				</tr>
				<tr>
					<td>E-Mail:</td>
					<td> <input  type="text" name="email" placeholder="max@muster.de"></td>
				</tr>
				<tr>
					<td>Eintrag:</td>
					<td><textarea value"Ihr Eintrag" name="eingabe" cols="30" rows="10" placeholder="Bitte 	geben Sie Ihren Gästebucheintrag ein."></textarea> </td>
				</tr>
			</table>
			<input id="submit" type="submit"value="Eintrag veröffentlichen">
		</form>


	</td>
	<td id="col2Entries">
	</td></tr>
	</table>
	</div>
</div>
	
<?php
	include "Footer.php";
?>