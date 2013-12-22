<?php
	include("config.php");
	$itemCount = $_COOKIE["itemCount"];
	setcookie("itemCount", $itemCount+1, time()+60*60*24*29, "/");		//Dieser Cookie merkt sich, welches Item aus der DB 																				ausgegeben werden muss.
	
	$res = mysql_query("SELECT * FROM products WHERE id='$itemCount'");
	$num = mysql_num_rows($res);
	$dsatz = mysql_fetch_assoc($res);
	
	$tmp = $dsatz["name"];

			echo '<div class="webshopItem">'
					.'<form action="/warenkorb.php?action=insert" method="post">'
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
				.'</form>'
				."</div>";
?>