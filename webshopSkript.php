<?php
	include("config.php");
	
	$res = mysql_query("SELECT * FROM products");
	$num = mysql_num_rows($res);
	$dsatz = mysql_fetch_assoc($res);

	echo '<form action="/warenkorb.php?action=insert" method="post">'
				.'<div style=" width : 60%; height : 100px; margin-top: 50px; margin-left: 20%; margin-right: 20%; color :black; background-color:#ff8a0e; text-align: center" name="test">'
					.$dsatz["name"]
					.'<input style="float: right;" type="submit" value="In den Warenkorb legen"/>';
					
					if($tmp == 'Ticket')
					{
						echo '<input type="text" name="artikel" value=Ticket style="position: absolute; left: -9999;"></input>';
					} else if ($tmp == 'Kinderticket'){
						echo '<input type="text" name="artikel" value=Kinderticket style="position: absolute; left: -9999;"></input>';
					} else if ($tmp == 'Gruppenticket') {
						echo '<input type="text" name="artikel" value=Gruppenticket style="position: absolute; left: -9999;"></input>';
					} else if ($tmp =='Modellauto Twingo') {
						echo '<input type="text" name="artikel" value=Modellauto Twingo style="position: absolute; left: -9999;"></input>';
					}
					
					echo'</br>'.$dsatz["price"]."€"."</br>"
					.'Menge: '
					.'<input style="float: right;" type="text" size="10" name="menge" maxlength="2"> </input>'
				."</div>"
		.'</form>';	
?>