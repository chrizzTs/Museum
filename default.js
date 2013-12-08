
$(document).ready(function(){
  $("#submit").click(function(){
  
  $("#entries").load("http://localhost:8080/GuestBook/CurrentDate");
  
  /*$("#entries").animate({opacity:"0", filter:"alpha(opacity=0)"}, 400 function(){
	  $("entries").load("http://localhost:8080/GuestBook/CurrentDate");
  });
  */
   alert("Hello world!");
  });

});
  


/*var submit = document.getElementById("submit");  


submit.addEventListener("click", getEntries, true);  

var xmlHttp = new XMLHttpRequest();

		
		
function getEntries(){
	
	
			

	if(xmlHttp.readyState==4 || xmlHttp.readyState==0){
	xmlHttp.open("GET", "foodstore.php", true);
	xmlHttp.onreadystatechange= handelServerResponse;
	xmlHttp.send(null);	
	}
	
}

function handelServerResponse(){

var status = xmlHttp.status;
alert(status);

	if(xmlHttp.status==0){
		
		alert("server Status 200");
	}

	
}

*/
