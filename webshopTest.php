<!DOCTYPE html>
	<?php
		include("config.php");
		echo "bin hier im webshop angekommen!";
		echo "<br> <br>";
	?>
	
	<html>
		<head>
			<title>Automuseum Webshop</title>
		</head>
		<body>
		<table width=500px border="2">
			<tr>
				<td> ID </td>
				<td> Name </td>
				<td> Preis </td>
				<td> Menge </td>
			</tr>
			<?php
				$result = mysql_query("SELECT * FROM products");
				while($row = mysql_fetch_assoc($result))
				{
					echo"<tr>";
					$id = $row["id"];
					$name = $row["name"];
					$preis = $row["price"];
					echo"<td> $id </td>";
					echo"<td> $name </td>";
					echo"<td> $preis </td>";
					echo'<td> <input type ="text" name="menge".$name></td>';
					echo"</tr>";
				}
			?>
		</table>
		<form action="warenkorb.php?action=insert" method="post">
			<select name="artikel">
				<?php
					$result = mysql_query("SELECT * FROM products");
					while($row = mysql_fetch_assoc($result))
					{
						$name = $row["name"];
						$id = $row["id"];
						echo"<option value ='$name'>$name</option>";
					}
				?>
			</select>
			<input type="text" name="menge" value="1" maxlength="2">
			<input type="submit" value="In den Warenkorb">
		</form>
		</body>
	</html>
