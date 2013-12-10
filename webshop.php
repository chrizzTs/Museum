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
		while($dsatz = mysql_fetch_assoc($res))
		{
			$tmp = $dsatz["name"];
			
			echo '<form action="/warenkorb.php?action=insert" method="post">'
				.'<div style=" width : 60%; height : 100px; margin-top: 50px; margin-left: 20%; margin-right: 20%; color :black; background-color:#ff8a0e; text-align: center" name="test">'
					.$dsatz["name"]
					.'<input style="float: right;" type="submit" value="In den Warenkorb legen"/>';
					if($tmp == 'Ticket')
					{
						echo '<input type="text" name="artikel" value=Ticket style="position: fixed; left: -9999;"></input>';
					} else if ($tmp == 'Kinderticket'){
						echo '<input type="text" name="artikel" value=Kinderticket style="position: fixed; left: -9999;"></input>';
					} else if ($tmp == 'Gruppenticket') {
						echo '<input type="text" name="artikel" value=Gruppenticket style="position: fixed; left: -9999;"></input>';
					} else if ($tmp =='Modellauto Twingo') {
						echo '<input type="text" name="artikel" value=Modellauto Twingo style="position: fixed; left: -9999;"></input>';
					}
					
									
					
					
					
					echo'</br>'.$dsatz["price"]."€"
					.'</br>'
					.'<span width=100% style =" text-align: right">Menge:</span>'
					.'<input style="float: right;" type="text" size="10" name="menge" maxlength="2"> </input>'
				."</div>"
				.'</form>';
		}
	?>
	</p>
</div>
<?php
	include "Footer.php";
?>
