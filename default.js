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

$("#name").click(function() {

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


