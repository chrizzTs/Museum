<?php
	include("config.php");
	setcookie("itemCount", 2, time()+60*60*24*29, "/");
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Willkommen in unserem Webshop</h2>
		</div>
		<p>Sind Sie ein angemeldeter Benutzer? Dann loggen Sie sich ein. Falls nicht, können Sie sich hier registrieren.</p>
		<input type="submit" value="Login" id="ImShopEinloggen">
		<input type="submit" value="Registrieren" id="ImShopRegistrieren">
	</div>
</div>
<div id="wrapper">
	 <?php
		$res = mysql_query("SELECT * FROM products");
		$num = mysql_num_rows($res);
		for($i =0; $i<$num-2;$i++)
		{
			$dsatz = mysql_fetch_assoc($res);
			$tmp = $dsatz["name"];
			
			echo '<form action="/warenkorb.php?action=insert" method="post">'
				.'<div style=" width : 60%; height : 100px; margin-top: 50px; margin-left: 20%; margin-right: 20%; color :black; background-color:#ff8a0e; text-align: center" name="test">'
					.$dsatz["name"]
					.'<input style="float: right;" type="submit" value="In den Warenkorb legen"/>';
					if($tmp == 'Ticket')
					{
						echo '<input type="hidden" name="artikel" value="Ticket" style="position: absolute; left: -9999;"></input>';
					} else if ($tmp == 'Kinderticket'){
						echo '<input type="hidden" name="artikel" value="Kinderticket" style="position: absolute; left: -9999;"></input>';
					} else if ($tmp == 'Gruppenticket') {
						echo '<input type="hidden" name="artikel" value="Gruppenticket" style="position: absolute; left: -9999;"></input>';
					} else if ($tmp =='Modellauto Twingo') {
						echo '<input type="hidden" name="artikel" value="Modellauto Twingo" style="position: absolute; left: -9999;"></input>';
					}
					
					echo'</br>'.$dsatz["price"]."€"
					.'</br>'
					.'<span width=100% placeholder:"Menge" style ="text-align: right;">Menge:</span>'
					.'<input style="float: right;" type="text" size="23" name="menge" maxlength="2"> </input>'
				."</div>"
				.'</form>';
		}
	?>
</div>

<div id="forButtonMehrAnzeigen">
		<input type="button" value="Mehr anzeigen" id="AjaxWebShopAbfrage">		<!-- Ruft id aus der default.js auf, die ruft 	-->	</div>																			<!--webshopskript auf -->				

<?php
	include "Footer.php";
?>
