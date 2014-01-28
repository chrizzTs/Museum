<?php
	//Diese Datei enthält die Startseite des Webauftritts. Außer den Header und Footer Daten ist lediglich eine animierte Slideshow zu sehen. Außerdem wird der "loggedIn"-Cookie, der für den webshop wichtig ist, auf den default Wert "no" gesetzt.
	



	if(!isset($_COOKIE["loggedIn"]))
	{
		setcookie("loggedIn","no",time()+60*60*24*29, "/");
	}
	include "Header.php";		//Einbinden Header
?>
<div id="page-wrapper" >
	<div id="page" class="container">
		<div class="title">
			<h2>Willkommen</h2>			
		</div>
	</div>

	<div id="wrapper" class="container">
		<div id="slides">	<!-- Slideshow -->
			<img src="images/auto1.jpg">
			<img src="images/auto2.jpg">
			<img src="images/auto3.jpg">
			<img src="images/auto4.jpg">
	  </div>
	</div>
</div>
<?php
	include "Footer.php";	//Einbinden Footer
?>


<!-- Redirect der Index-Seite, wenn sie mit einem mobilen Gerät besucht wird. -->
<script>
if ((screen.width < 699) //Bei einer Screengröße kleiner 699px, wird von der Index-Seite auf eine andere Seie redirected.
&& document.cookie.indexOf("skipmobile") == -1)
{
document.location = "AudiR8.php";
}
</script>
