<?php
	//Dieses Skript wird über die default.js aufgerufen, sobald ein User die "Mehr anzeigen" Schaltfläche im Web-Shop betätigt hat. Es fragt über den "itemCount"-Cookie ab, wie viele Shopgegenstönde schon angezeigt werden. Anschließend werden alle Einträge aus der products-Tabelle abgefragt und die, die bereits angezeigt werden verworfen. Für den nächsten wird der Eintrag generiert und zurückgegeben. Hier könnte auch variiert werden in mehrere Artikel, wenn die Anzahl steigt
	
	include("config.php"); //Aufbau der DB-Verbindung und überprüfen des user-Cookies
	
	//Abfragen der Artikelanzahl und aktualisieren des Cookies
	$itemCount = $_COOKIE["itemCount"];
	$itemCount++;
	setcookie("itemCount", $itemCount, time()+60*60*24*29, "/");		//Dieser Cookie merkt sich, welches Item aus der DB ausgegeben werden muss.
	
	//Abfragen aller Artikel aus der products-Tabelle
	$res = mysql_query("SELECT * FROM products");
	$num = mysql_num_rows($res);
	
	//Verwerfen der bereits angezeigten
	for($i = 0; $i < $itemCount-1; $i++) //Hier könnte man einfach alle auswählen und dann das item aus dem Array an der Stelle itemCount nehmen
	{
		mysql_fetch_assoc($res);
	}
	
	//Generieren der Ausgabe
	$dsatz = mysql_fetch_assoc($res);
	$tmp = $dsatz["name"];
	echo '<div class="webshopItem">'
			.'<form action="/warenkorb.php?action=insert" method="post">'
				.$dsatz["name"]
				.'<input style="float: right;" type="submit" value="In den Warenkorb legen"/>'
				.'<input type="hidden" name ="artikel" value ='."$tmp".'>'
				.'</br>'.$dsatz["price"]."€"
				.'</br>'
				.'<span width=100% placeholder:"Menge" style ="text-align: right;">Menge:</span>'
				.'<input style="float: right;" type="text" size="23" name="menge" maxlength="2"> </input>'
			.'</form>'
		."</div>";
?>