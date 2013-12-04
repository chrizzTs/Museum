<?php
	$title = "Kontakt";
	include "Header.php";
?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Gästebuch</h2>
		</div>
	<div id="two-column" class="container">
			<div id="tbox1">
			<form action="demo_keygen.asp" method="get">
				Name: <input  type="text" name="name"> </br>
				E-Mail: <input  type="text" name="email"> </br>
				Eintrag: <textarea value"Ihr Eintrag" name="post" cols="50" rows="10"></textarea> </br>

			<input type="submit"value="Eintrag veröffentlichen">
			</form>
			</div>
			
			<div id="tbox2">
			dfdfd
			 <input type="button" onclick="getGuestBookEntries()" value="transparenz" />;
			</div>
	</div>
	</div>
</div>

<script language="javascript" type="text/javascript">
xmlhttp = new XMLHttpRequest();

function getGuestBookEntries(){
	xmlhttp.onreadystatechange =
	function()
	{
		if(xmlhttp.readyState ==4 && xmlhttp.status==200)
		{
			document.getElementById('tbox2').innerHTML = xmlhtp.responseText;
		}
		}
	}
	
	xmlhttp.open("GET", "http://localhost:8080/GuestBook/CurrentDate", true);
	xmlhttp.send();
}
</script>
	
<?php
	include "Footer.php";
?>