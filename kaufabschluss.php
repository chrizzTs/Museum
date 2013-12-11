<?php
include("config.php");
include "Header.php";

?>

<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Vielen Dank für Ihren Einkauf!</h2>
		</div>
		<p>Das Team des Automuseums Mannheim sagt Danke! </br>
			<a href ="index.php"> Kehren Sie zur Museumsseite zurück</a>
		</p>
	</div>
</div>
<?php
	$sid = $_COOKIE["user"];
	$result = mysql_query("SELECT * FROM warenkorb WHERE sid = '$sid'");
	$betrag = 0;
	while($row = mysql_fetch_assoc($result))
	{
		$betrag += $row["menge"]*$row["preis"];
	}
	if(!mysql_query("INSERT INTO verkauft VALUES ('', '$sid', '$betrag', 'FALSE')")) echo mysql_error();
	mysql_query("DELETE FROM warenkorb WHERE sid = '$sid'");
	?>
<?php

include "Footer.php";

?>