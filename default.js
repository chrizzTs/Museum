
$(document).ready(function(){

	loadData();

});

$("#submit").click(function() {
$("#entries").load("guestBookEntries.php");
});

function loadData(){
	 $("#tbox2Entries").animate({opacity:"0", filter:"alpha(opacity=0)"}, 400, function(){
	 $("#tbox2Entries").load("guestBookEntries.php",function(){
	 $("#tbox2Entries").animate({opacity:"1", filter:"alpha(opacity=100)"}, 400);
	 });
	 });
	
}

$("#name").click(function() {

});

