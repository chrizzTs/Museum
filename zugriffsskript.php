<?php
	try{
		$db = new MySql("localhost","root","","webshop_products");
		echo "Verbindung offen </br>";
		$db -> close();
		echo "Verbindung geschlossen </br>";
		
	} catch (Exception $e) {
		echo "Fehler: ".htmlspecialchars($e -> getMessage());
	}

?>