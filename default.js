//EventHandeler..............

$(document).ready(function(){

	loadData();
	windowSize();
});



$(window).resize(function(){
windowSize();
});


$( "#guestbookAdmin" ).click(function( event ) {
	  $("#wrapper").load("getGuestBookServletContent.php");
	   
	});








//Funktionen..............

function loadData(){
	 $("#col2Entries").animate({opacity:"0", filter:"alpha(opacity=0)"}, 400, function(){
	 $("#col2Entries").load("guestBookEntries.php",function(){
	 $("#col2Entries").animate({opacity:"1", filter:"alpha(opacity=100)"}, 400);
	 });
	 });
	
}

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

	alert("hat geklappt");
	var posting = $.post( "webshopSkript.php");
	posting.done(function (data ) {
	$("#wrapper").append(data);
	});
	
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
 $(".container").css({"width": $(window).width()-40});
 $(".container2").css({"width": $(window).width()-150});
 
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


