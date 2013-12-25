<?php
//Diese Datei hat zwei Funktionen. Zum einen werden hier die Artikel eingefügt, die im webshop.php ausgwählt und mit der "In den Warenkorb legen" Schaltfläche bestätigt wurden in die warenkorb Tabelle gelegt. Zum anderen wird dem User hier angezeigt, was sich alles in seinem Warenkorb befindet und die Möglichkeit geboten den Einkauf zu bestätigen.
//Um die Artikel in die warenkorb Tabelle einzufügen, wird zunächst überprfüft, ob ein User eingeloggt ist. Dann werden ihm die Daten direkte zugeschrieben, ansonsten dem Wert, der in seinem "user" Cookie steht. Sobald er sich einloggt, werden die Daten im shopLoginSkript.php umgeschrieben. Anschließend wird überprüft, ob der Benutzer eine Menge größer 0 angegeben hat, falls nicht, werden nur seine warenkorb-Daten angezeigt. Danach wird überprüft, ob dieser User schon genau diesen Artikel bereits in seinem Warenkorb hat. In dem Fall wird nur die Anzahl erhöht. Ansonsten wird ein neuer Eintrag angelegt.
//Nachdem dieses Skript durchlaufen ist, wird dem User eine Tabelle präsentiert, in der alle Artikel seines Warenkorbs zu finden sind. Unter dieser Tabelle findet der User die Möglichkeit den Einkauf mittels der Schaltfläche "Kaufen" abzuschließen oder über den Link "Weitershoppen" wieder in den Webshop zu gelangen.
//Falls kein User auf dem Client eingeloggt ist, wird die Möglichkeit geboten, sich einzuloggen oder zu registrieren durch die Schaltflächen "Login" und "Registrieren", befindlich im oberen Teil des Wrappers.


	include("config.php");	//Aufbauen der DB-Verbindung und überprüfen des "user"-Cookies
	
	if(!isset($_GET["action"]))$_GET["action"] ="insert";
	
	//Überprüfen, ob ein User auf dem Client eingeloggt ist
	$tmp = $_COOKIE["loggedIn"];
	if($tmp!="no")
	{
		//Falls ein User auf dem Client eingeloggt ist, wird die Variable auf den Wert des "loggedIn"-Cookie gesetzt
		$sid = $_COOKIE["loggedIn"];
	} else {
		//Falls kein User auf dem Client eingeloggt ist, wird die Variable auf den Wert des "user"-Cookie gesetzt
		$sid = $_COOKIE["user"];	//mit dieser Variable werden die Artikel aus der warenkorb Tabelle abgerufen
	}
	
	include "Header.php";	//Einbinden des Header
	
	//Falls die Aktion insert ist werden die Artikel hinzugefügt, evtl kann später ein entfernen der Artiekel implementiert werden
	if($_GET["action"]=="insert")
	{
	
		//Einlesen der Daten, die in den Warenkorb gelegt werden sollen
		$artikel = $_POST["artikel"];
		$menge = $_POST["menge"];
		
		if((int)$menge == "0")
		{
			//Menge = 0, daher skript beendet
			header("Location: warenkorb.php");
		} else {
			
			//abrufen der Artikelinfos aus der Product-Tabelle des Artikels, der vom User ausgewählt wurde
			$result = mysql_query("SELECT * FROM products WHERE name='$artikel'");
			$show = mysql_fetch_array($result);
			$id = $show["id"];
			$preis = $show["price"];
						
			//überprüfen ob der User das Produkt schon im Warenkorb hat
			$num = mysql_num_rows(mysql_query("SELECT wkid FROM warenkorb WHERE pid='$id' AND sid='$sid'"));			
			if($num =="0"){
			
				//noch nicht vorhanden --> neuer Eintrag
				$result = mysql_query("INSERT INTO warenkorb VALUES('','$sid','$id','$artikel','$menge','$preis')");
			} else {
			
				//bereits vorhanden --> aktualisieren der Menge
				$result = mysql_query("UPDATE warenkorb SET menge=menge+$menge WHERE pid='$id'");
			}
			header("Location: warenkorb.php");
		}
	}
	
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Willkommen in unserem Webshop</h2>
		</div>
		<p>
			<?php
				if($_COOKIE["loggedIn"] == "no")
				{
				
					//Falls kein Benutzer auf dem Client eingeloggt ist, wird die Möglichkeit geboten sich einzuloggen oder zu registrieren
					echo "Bitte loggen Sie sich ein bevor Sie Ihren Kauf abschließen.</p>".
					'<input type="submit" value="Login" class="ImShopEinloggen">'.
					'<input type="submit" value="Registrieren" class="ImShopRegistrieren">';
				} else {
					
					//Falls ein Benutzer auf dem Client eingeloggt ist, wird er kurz begrüßt
					echo "Hier sehen Sie Ihren Einkauf, $sid :</p>";
				}
			?>
	</div>
</div>

<!-- Generieren der Tabelle	-->
<div id="wrapper" style="text-align: center;">
	<div class="vonAnfangAn">
		<table width=500px border = "2" align="center">
			<!-- Tabellenkopf erzeugen -->
			<tr>
				<td> Artikel </td>
				<td> Menge </td>
				<td> Einzelpreis </td>
				<td> Gesamtpreis </td>
			</tr>
			
			<?php
				//alle Artikel abrufen, die in der Warenkorb Tabelle liegen und diesem Nutzer zugeordnet sind
				$result = mysql_query("SELECT * FROM warenkorb WHERE sid ='$sid'");
				if(!$result) echo mysql_error();
					$gesamtpreis = 0;
					
					//Solange es noch Einträge gibt, wird eine neue Zeile in der Tabelle angelegt und der Gesamtpreis erhöht
					while($row = mysql_fetch_assoc($result))
					{
						$name = $row["products"];
						$preis = $row["preis"];
						echo "<tr>";
							echo "<td>".$name."</td>";
							echo "<td>".$row["menge"]."</td>";							
							echo "<td>".$preis."€</td>";							
							echo "<td>".$row["menge"]*$preis."€</td>";							
						echo "</tr>";
						$gesamtpreis += $row["menge"]* $preis;
					}
					
					//letzte Reihe der Tabelle ist der Gesamtpreis
				echo "<tr><td align='right' colspan='4'>$gesamtpreis €</td></tr>".
			'</table>';
			?>
			
		<!--	"Kaufen" Schaltfläche, die aktiviert wird, wenn ein user auf dem Client eingeloggt ist. Wenn sie betätigt wird, wird das "kaufabschluss.php" 		Skript aufgerufen und der Einkauf des Users abgeschlossen	-->
		<form action ="kaufabschluss.php?action=buy" method="post">
			<?php
				if($_COOKIE["loggedIn"]=="no")
				{
					echo '<input type="submit" value="Kaufen" disabled>';
				} else {
					echo '<input type="submit" value="Kaufen">';
				}
			?>
		</form>
		
		<!--	Link zum Zurückkehren in den Webshop	-->
		<a href="webshop.php">Weitershoppen</a>
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

<?php
	include "Footer.php";	//Einbinden des Footers
?>
