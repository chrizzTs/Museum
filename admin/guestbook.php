<?php
	$title = "Gästebuchverwaltung";
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container2">
		<div class="title">
			<h2>Gästebuchverwaltung</h2>
		</div>

<div id="wrapper" class="container2">
<?php
echo file_get_contents("http://localhost:8080/GuestBook/CurrentDate"); //Daten aus Servlet holen 
?>
</div>
<?php
	include "Footer.php";
?>