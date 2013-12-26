<?php
	//Diese Datei zeigt dem Admin an, welche Shop-Verwaltungsmöglichkeiten sich ihm bieten. Er kann neue Artikel mit Namen und Preis einfügen, oder eine Auswahl von Artikeln löschen. In der ersten Spalte, die das Anlegen neuer Artikel ermöglicht, sind zwei Eingabefelder für die Daten und eine Schaltfläche "neuen Artikel hinzufügen" zum Absenden der Daten zu sehen. Diese Daten werden dann vom artikelHinzufuegenSkript.php ausgewertet. In der Zweiten Spalte werden tabellarisch alle Artikel aus der Tabelle aufgelistet und es besteht die Möglichkeit mittels einer Checkbox die zum Löschen auszuwählen und diese Auswahl mit einer Schaltfläche "Ausgewählte Artikel löschen" aus der Tabelle zu entfernen. Diese Auswahl wird von dem artikelLueschenSkript.php ausgewertet.
	
	include("Header.php");	//Einbinden Header
	include("../config.php");	//Aufbau der DB-verbindung und überprüfen des User-Cookies
?>
<div id="page-wrapper">
	<div id="page" class="container2">
		<div class="title">
			<!-- Seiten Titel -->
			<h2>Shopverwaltung</h2>
		</div>
		<div id="wrapper" class ="container">
			<div id="two-column">
				<div>
				<!-- Erste Spalte zum Hinzufügen der Artikel -->
					<p>
						Hier können Sie neue Artikel dem Sortiment hinzufügen:
					</p>
					<form>
						<table>
							<tr>
								<td>Artikel</td>
								<td><input type="text" size="30" name="artikelNeu"></td>
							</tr>
							<tr>
								<td>Preis</td>
								<td><input type="text" size="30" name ="preisNeu"></td>
							</tr>
							<tr>
								<!-- über die ID dieser Schaltfläche wird das Event von der defualt.js abgefangen und verarbeitet bzw. an das 											artikelHinzufuegenSkript.php weitergeleitet -->
								<td colspan="2"><input type="submit" value="neuen Artikel hinzufügen" id="neuenArtikelHinzufügen"</td>
							</tr>
						</table>
					</form>
				</div>
				<div>
				<!-- Zweite Spalte zum Löschen der Artikel -->
					<p>
						Hier können Sie Artikel aus dem Sortiment löschen:
					</p>
					<form id="artikelLöschen"> <!-- über die ID dieses Formulars wird das Event von der defualt.js abgefangen und verarbeitet bzw. an 												das artikelLoeschenSkript.php weitergeleitet -->
						<table>	
							<tr>
								<td>Artikel</td>
								<td>Auswahl</td>
							</tr>
							<?php
								//Abfrage aller Artikel aus der Tabelle products und Ausgabe in der Tabelle
								$result = mysql_query("SELECT * FROM products");
								$num = mysql_num_rows($result);
								for($i = 0; $i < $num; $i++)
								{
									$data = mysql_fetch_assoc($result);
									$name = $data["name"];
									echo "<tr>";
										echo "<td>"."$name"."</td>";
										echo "<td>"."<input type=checkbox name='$name' class='toDelete'>"."</td>";
									echo "</tr>";
								}
							?>
							<tr>
								<td colspan="3"><input type="submit" value ="Ausgewählte Artikel löschen"></td>
							</tr>
						</table> <!--	Tabelle zur Auswahl der Artikel, die gelöscht werden sollen	-->
					</form>	<!--	Formular zum Löschen der Artikel	-->
				</div>	<!--	div, das in der zweiten Spalte liegt	-->
			</div>	<!--	id="two-column"	-->
		</div>	<!--	id="wrapper"	-->
	</div>	<!--	id="page"	-->
</div>	<!--	id="page-wrapper"	-->
<?php
	include("Footer.php");	//Einbinden Footer
?>