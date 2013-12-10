//EventHandeler..............

$(document).ready(function(){

	loadData();
	windowSize();

});

$("#submit").click(function() {
$("#entries").load("guestBookEntries.php");
});

$(window).resize(function(){
windowSize();
});



//Funktionen..............

function loadData(){
	 $("#tbox2Entries").animate({opacity:"0", filter:"alpha(opacity=0)"}, 400, function(){
	 $("#tbox2Entries").load("guestBookEntries.php",function(){
	 $("#tbox2Entries").animate({opacity:"1", filter:"alpha(opacity=100)"}, 400);
	 });
	 });
	
}

$( "form" ).submit(function( event ) {
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




function windowSize(){
 $(".container").css({"width": $(window).width()-40});
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


