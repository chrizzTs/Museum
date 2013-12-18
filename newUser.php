<?php
	if($_GET["action"]=="insert")
	{
		$vorname = $_POST["vorname"];
		$nachname = $_POST["nachname"];
		
		echo("$vorname, $nachname");
	}
?>