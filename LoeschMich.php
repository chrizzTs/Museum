<?php
	include("config.php");
	echo "Ich werde aufgerufen";
	
	if(!isset($_GET["action"]))$_GET["action"] ="insert";
	

	
	if($_GET["action"]=="insert")
	{
		echo "</br>";
		$artikel = $_POST["artikel"];
		echo $artikel;
		$menge = $_POST["menge"];
		echo $menge;

	}
?>