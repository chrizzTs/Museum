<?php
	$title = "Admin";
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container2">
		<div class="title">
			<h2>Adminbereich</h2>
		</div>

		<p id="replyPost">Dieser Bereich ist nur für Leute mit eine entsprechenden Berechtigung erreichbar, um Wartungen der Arbeit vorzunehmen</p>
		<p> 
			<form id="loginForm">
				<p>Ihr Username:<br /><input id="username" name="username" type="text" size="30" maxlength="30"/></p>
				<p>Passwort<br /><input id="password" name="password" type="password" size="30" maxlength="40"/></p>
				<input type="submit" value="login"/>
			</form>
		</p>

	</div>
</div>
<?php
	include "Footer.php";
?>