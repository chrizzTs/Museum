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