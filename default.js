//EventHandeler..............

$(document).ready(function(){

	loadData();
	windowSize();
});



$(window).resize(function(){
windowSize();
});


//Funktionen..............

function loadData(){
	 $("#col2Entries").animate({opacity:"0", filter:"alpha(opacity=0)"}, 400, function(){
	 $("#col2Entries").load("guestBookEntries.php",function(){
	 $("#col2Entries").animate({opacity:"1", filter:"alpha(opacity=100)"}, 400);
	 });
	 });
	
}

// Login Echo Injection
$( "#loginForm" ).submit(function( event ) {
 	event.preventDefault();
 	
 	var username = $("#username").val();
 	var password = $("#password").val();

   var posting = $.post( "admin/login.php", {username:username, password:password});
   posting.done(function( data ) {
   	if(!(data =="Success")){
		  $("#replyPost").html(data);
   	}else {
	   	window.location = "admin/index.php"		
   	}
 
	  
	});

	
});

// Kontaktformular Post und Echo Injection
$( "#kontaktform" ).submit(function( event ) {
 	event.preventDefault();
 	
 	var name = $("#name").val();
 	var email = $("#email").val();
 	var eingabe = $("#eingabe").val();

   var posting = $.post( "AnfrageSkript.php", {name:name, email:email, eingabe:eingabe});
   posting.done(function( data ) {
	  $("#replyPost").html(data);
	  $("#kontaktform").hide("fast");
	 
	  
	});

	
});

//Asynchrone Webshop Abfrage

$("#AjaxWebShopAbfrage").click(function(event) {
	event.preventDefault();		//TEST!!
	var parent = document.getElementById("wrapper");
	var kids = parent.childNodes.length;
	if(parent.childNodes.length == 4)
	{
		$("#AjaxWebShopAbfrage").hide();
	}
	var posting = $.post( "webshopSkript.php");
	posting.done(function (data ) {
	var $new = data;
	$('#wrapper').append($new);
	$new.show('slow');
	});
	
});

//Registrieren und LogIn

$('#ImShopRegistrieren').click(function(event){
	event.preventDefault();
	$("#wrapper").load("Test.html");
	$("#forButtonMehrAnzeigen").html('');
	

});

$('#ImShopEinloggen').click(function(event){
	event.preventDefault();
	$("#wrapper").empty();
	
});




//Gästebuch Eintrag Post und Echo Injection
$( "#guestbookForm" ).submit(function( event ) {
 	event.preventDefault();
 	 
 	var name = $("input[name='name']").val();
 	var email = $("input[name='email']").val();
 	var eingabe = $("textarea[name='eingabe']").val();
 	 	

   var posting = $.post( "addEntry.php", {name:name, email:email, eingabe:eingabe});
   posting.done(function( data ) {
	  $("#replyGuestbookEntry").html(data);
	  loadData();
	    
	});

	
});


function windowSize(){
 $("#header-wrapper").css({"width": $(window).width()});



 
}

    $(function() {
      $('#slides').slidesjs({
        width: 960,
        height: 600,
        play: {
          active: true,
          auto: true,
          interval: 4000,
          swap: true
        }
      });
    });

