<?php
//Diese Seite ist die Startseite des Webshops und wird aufgerufen, sobald der User diesen Bereich betritt. Zu Beginn werden der "itemCount" und "loggedIn" Cookie ausgelesen und ggf. bearbeitet. Der "loggedIn-Cookie" dient dazu, dass alle Artikel bis auf 2 (skalierbar mit Anzahl der Artikel) angezeigt werden und Ajax-Abfrage zum Laden neuer Artikel weiß, wie viele Artikel bereits angezeigt werden und welcher neu angefügt werden muss. Der "loggedIn"-Cookie beeinflusst das Aussehen der Seite.
//Außerdem hat der User die Möglichkeit dynamisch die Seite zu verändern, indem er die "Login" oder "Registrieren" Schaltfläche im oberen Teil dieser Seite betätigt. Falls bereits ein User eingeloggt ist, besteht hier die Möglichkeit sich auszuloggen.
//Darunter befindet sich für jeden angezeigten Artikel ein Bereich, in dem die gewünschte Anzahl dieser Artikel mittels des warenkorb.php Skripts in den Warenkorb einzufügen. Damit verlässt der User die Seite.
//Zuletzt hat der User die Möglichkeit durch betätigen der Schaltfläche "Mehr Anzeigen" weitere Artikel aus der Datenbank abzufragen und anzeigen zu lassen. Falls bereits alle angezeigt werden, wird die Schaltfläche ausgeblendet, um inkosistenten zu vermeiden und den User nicht zu verwirren.

	include("config.php"); //Aufbau DB-Verbindung und überprüfen des User-Cookies
	
	//überprüfen und ggf. setzen des itemCount-Cookies
	$num = mysql_num_rows(mysql_query("SELECT * FROM products"));
	setcookie("itemCount", $num-2, time()+60*60*24*29, "/");
	
	//überprüfen ob ein Benutzer eingeloggt ist
	if(!isset($_COOKIE["loggedIn"]))
	{
		setcookie("loggedIn","no",time()+60*60*24*29, "/");
	} else {
		$name = $_COOKIE["loggedIn"];
	}
	
	include "Header.php";	//Einbinden Header
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<!-- Titel der Seite -->
			<h2>Willkommen in unserem Webshop</h2>
		</div>
			<?php
				
				if($name != "no")
				{
					//User auf diesem Client eingeloggt, daher wird die Logout Schaltfläche angezeigt.
					echo '<p>'."Hallo $name".'</p>'.
					'<input id="logoutButton" type="submit" value="Logout">'.
					'<a href="warenkorb.php">'.
						'<button>Zum Warenkorb</button>'.
					'</a>';
				} else {
					//Kein User auf diesem Client eingeloggt, daher werden Login und Registrieren Schaltflächen angezeigt
					echo '<p>'."Sind Sie ein angemeldeter Benutzer? Dann loggen Sie sich ein. Falls nicht, können Sie sich hier registrieren.".'</p>'.
					'<input type="submit" value="Login" class="ImShopEinloggen">'.
					'<input type="submit" value="Registrieren" class="ImShopRegistrieren">';
				}
			?>
	</div>
</div>
<div id="wrapper">

	<!-- Die verschiedenen Artikel, die dem Warenkorb hinzugefügt werden können und von Beginn an angezeigt werden -->
	<div id="vonAnfangAn">
	 <?php
	 	//Abfrage der Artikel aus der products Tabelle
		$res = mysql_query("SELECT * FROM products");
		$num = mysql_num_rows($res);
		
		//Generieren der Ausgabe
		for($i = 0; $i<$num-2;$i++)
		{
			$dsatz = mysql_fetch_assoc($res);
			$tmp = $dsatz["name"];
			
			echo '<div class="webshopItem">'
					.'<form action="/warenkorb.php?action=insert" method="post" >'
					.$dsatz["name"]
					.'<input style="float: right;" type="submit" value="In den Warenkorb legen"/>'
					.'<input type="hidden" size="30" name ="artikel" value ="'.$tmp.'">'
					.'</br>'.$dsatz["price"]."€"
					.'</br>'
					.'<span width=100% placeholder:"Menge" style ="text-align: right;">Menge:</span>'
					.'<input style="float: right;" type="text" size="23" name="menge" maxlength="2"> </input>'
				.'</form>'
				."</div>";
		}
	?>
	</div>
	
	<!--	Das Formular aus der Datei Registrieren.html wird vorgeladen und ausgeblendet	-->
	<!--	Sobald der User die Schaltfläche "Registrieren" betätigt wird das Formular ein- und die Artikel dynamisch durch die default.js ausgeblendet	-->
	<div class="wirdZumRegistrierenGeladen">
		<?php
			include("Registrieren.html");
		?>
	</div>
	
	<!--	Das Formular aus der Datei Login.html wird vorgeladen und ausgeblendet	-->
	<!--	Sobald der User die Schaltfläche "Login" betätigt wird das Formular ein- und die Artikel dynamisch durch die default.js ausgeblendet	-->
	<div class="wirdZumLoginGeladen">
		<?php
			include("Login.html");
		?>
	</div>
</div>

<!--	Hier befindet sich der Button, der es dem User ermöglicht sich mehr Artikel anzeigen zu lassen, falls alle angezeigt werden, ausgeblendet	-->
<!--	ruft über die default.js das webshopSkript.php auf	-->
<div id="forButtonMehrAnzeigen">
		<input type="button" value="Mehr anzeigen" id="AjaxWebShopAbfrage">		<!-- Ruft id aus der default.js auf, die ruft 	-->	
		</div>
																				<!--webshopskript auf -->				

<?php
	include "Footer.php";	//Einbinden des Footers
?>
