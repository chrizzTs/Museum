<?php
	include("config.php");
	include "Header.php";
	
	if(!isset($_GET["action"]))$_GET["action"] ="insert";
	
	
	$sid = $_COOKIE["user"];
	
	if(isset($_COOKIE["user"]))
	{
	} else {
		echo"COOKIE NICHT GESETZT";
	}
	
	if($_GET["action"]=="insert")
	{
		$artikel = $_POST["artikel"];
		$menge = $_POST["menge"];

		
		if((int)$menge == "0")
		{
			header("Location: warenkorb.php");
		} else {
			
			//abrufen der Artikelinfos aus der Product-Datenbank
			$result = mysql_query("SELECT * FROM products WHERE name='$artikel'");
			
			$show = mysql_fetch_array($result);
			
			$id = $show["id"];
			$preis = $show["price"];
			
			//überprüfen ob das produkte zu der Session schon im Warenkorb liegt
			$num = mysql_num_rows(mysql_query("SELECT wkid FROM warenkorb WHERE pid='$id' AND sid='$sid'"));
 			#echo mysql_num_rows(mysql_query("SELECT * FROM warenkorb WHERE pid='$id' AND sid='$sid'"));  ich glaube das war nur zum Test


			
			if($num =="0"){
				$result = mysql_query("INSERT INTO webshop.warenkorb VALUES('','$sid','$id','$artikel','$menge','$preis')");
				if(!$result) echo "Ungültige Anfrage".mysql_error();
			} else {
				$result = mysql_query("UPDATE warenkorb SET menge=menge+$menge WHERE pid='$id'");
				if(!$result) echo mysql_error();
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
				<p>Lorem ipsum[...]</p>
			</div>
		</div>
		<div id="wrapper">
			<table width=500px border = "2">
				<tr>
					<td> Artikel </td>
					<td> Menge </td>
					<td> Einzelpreis </td>
					<td> Gesamtpreis </td>
				</tr>
				<?php
					$result = mysql_query("SELECT * FROM warenkorb WHERE sid ='$sid'");
					if(!$result) echo mysql_error();
					$gesamtpreis = 0;
					while($row = mysql_fetch_assoc($result))
					{
						$name = $row["products"];
						$preis = $row["preis"];
						echo "<tr>";
							echo "<td>".$name."</td>";
							echo "<td>".$row["menge"]."</td>";							
							echo "<td>".$preis."</td>";							
							echo "<td>".$row["menge"]*$preis."</td>";							
						echo "</tr>";
						$gesamtpreis += $gesamtpreis + $row["menge"]* $preis;
					}
					echo "<tr><td align='right' colspan='4'>$gesamtpreis</td></tr>";
				?>
			<form action ="kaufabschluss.php?action=buy" method="post">
			<input type="submit" value="Kaufen">
			</form>
			<a href="webshop.php">Weitershoppen</a>
		</div>
				
<?php
	include "Footer.php";
?>