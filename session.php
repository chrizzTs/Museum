<?php
	if(!isset($_COOKIE["user"]))
	{
		$tmp = md5(microtime());
		$duration = 60*60*24;
		setcookie("user", $tmp, time()+60*60*24*29, "/");
	} else {
		
		echo("");
	}
?>