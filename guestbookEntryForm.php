<form action="addEntry.php" method="post">
	<table>
		<tr>
			<td>Name: </td> 
			<td><input  type="text" id="name" name="name" placeholder="Max Muster"><td>
		</tr>
		<tr>
			<td>E-Mail:</td>
			<td> <input  type="text" name="email" placeholder="max@muster.de"></td>
		</tr>
			<td>Eintrag:</td>
			<td><textarea value"Ihr Eintrag" name="post" cols="30" rows="10" placeholder="Bitte 	geben Sie Ihren Gästebucheintrag ein."></textarea> </td>
		</tr>
	</table>
	<input id="submit" type="submit"value="Eintrag veröffentlichen">
</form>
