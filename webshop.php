<?php
	include("config.php");
	include "Header.php";
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
	<p> <?php
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
						echo '<input type="text" name="artikel" value=Ticket style="width=5000px;"></input>';
					} else if ($tmp == 'Kinderticket'){
						echo '<input type="text" name="artikel" value=Kinderticket style="width=5000px;"></input>';
					} else if ($tmp == 'Gruppenticket') {
						echo '<input type="text" name="artikel" value=Gruppenticket style="width=5000px;"></input>';
					} else if ($tmp =='Modellauto Twingo') {
						echo '<input type="text" name="artikel" value=Modellauto Twingo style="width=5000px;"></input>';
					}
					
					echo'</br>'.$dsatz["price"]."€"
					.'</br>'
					.'<span width=100% placeholder:"Menge" style ="text-align: right;">Menge:</span>'
					.'<input style="float: right;" type="text" size="10" name="menge" maxlength="2"> </input>'
				."</div>"
				.'</form>';
		}
	?>
	</p>
</div>
<div id="forButtonMehranzeigen">
		<input type="button" value="Mehr anzeigen" id="AjaxWebShopAbfrage">
	</div>
<?php
	include "Footer.php";
?>
