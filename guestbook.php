<?php
	$title = "Kontakt";
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Gästebuch</h2>
		</div>
		
	<table>
	<tr><td align="left"   valign="top">
			<div id="tbox1">
				<?php
				include "guestbookEntryForm.php";
				?>
			</div>
	</td>
	<td>
			<div id="tbox2Entries">
		
			</div>
	</td></tr>
	</table>
	</div>
</div>


	
<?php
	include "Footer.php";
?>