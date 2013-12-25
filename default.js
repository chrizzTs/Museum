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
	event.preventDefault();
	var parent = document.getElementById("vonAnfangAn");
	var posting = $.post("anzahlDerVerfügbarenArtikel.php")
	posting.done(function (data) {
		data++;
		if(parent.childNodes.length >= data)
		{
			$("#AjaxWebShopAbfrage").hide();
		}
	});
	var posting = $.post( "webshopSkript.php");
	posting.done(function (data ) {
		var toBeAdded = data;
		$('#vonAnfangAn').append(toBeAdded);
	});
	
});

//Registrieren und LogIn


//ändert die Seite, nachdem registrieren im WebShop geklickt wurde
$('.ImShopRegistrieren').click(function(event){
	event.preventDefault();
	$(".wirdZumRegistrierenGeladen").css('display','block');
	$(".wirdZumLoginGeladen").css('display','none');
	$('.vonAnfangAn').css('display','none');
	$('.webshopItem').css('display','none');
	$("#forButtonMehrAnzeigen").html('');
});


//ändert die Seite, nachdem Login im WebShop geklickt wurde
$('.ImShopEinloggen').click(function(event){
	event.preventDefault();
	$(".wirdZumLoginGeladen").css('display','block');
	$(".wirdZumRegistrierenGeladen").css('display','none');
	$('.vonAnfangAn').css('display','none');
	$('.webshopItem').css('display','none');
	$("#forButtonMehrAnzeigen").html('');
});


//ruft das PHP-Skript auf, das den neuen User in der Datenbank anlegt
$("#registrierungAbschicken").click(function(event){
 	event.preventDefault();
 	setzeFarbenZurueck();

 	var eingabenVollstaendig = testeVollstaendigkeit();
 	var vorname = $("input[name='vorname']").val(); 
	var	nachname = $("input[name='nachname']").val();	
	var	username = $("input[name='username']").val();
	var	passwort = $("input[name='passwort']").val();
	var	passwort2 = $("input[name='passwortKontrolle']").val();
	var	wohnort = $("input[name='wohnort']").val();
	var	plz = $("input[name='plz']").val();
	var	strasse = $("input[name='strasse']").val();
	var	hausnummer = $("input[name='hausNr']").val();
	var	mail = $("input[name='mail']").val();
	var	mail2 = $("input[name='mailKontrolle']").val();
	var	tele = $("input[name='tele']").val();
	
	if(!eingabenVollstaendig)
	{
		$('#page-wrapper').css('color','red'); 
		$('#page-wrapper').html('Die Eingaben sind nicht vollständig!');
	}
	if(passwort != passwort2)
	{
		$('#page-wrapper').css('color','red'); 
		$('.inputPasswort').css('color','red');
		$('#page-wrapper').html('Passwörter stimmen nicht überein!');		
	}
	if(mail != mail2)
	{
	 	$('#page-wrapper').css('color','red');
	 	$('.inputMail').css('color','red');
		$('#page-wrapper').html('Mail-Adressen stimmen nicht überein!');
	}
	if(mail == mail2 && passwort == passwort2 && eingabenVollstaendig)
	{
		var posting = $.post("newUser.php?action=insert", {vorname: vorname, nachname: nachname, username: username, passwort: passwort, wohnort : wohnort, plz : plz, strasse : strasse, 					hausNr : hausnummer, mail : mail, tele : tele});
		posting.done(function (data){
			alert(data);
			if(data=="funktioniert")
			{
				$('#page-wrapper').css('font-color','black');
				$('#page-wrapper').css('font-style','bold');
				$('#page-wrapper').html('Vielen Dank für Ihre Registrierung');
				$("#wrapper").html("Anmeldung erfolgreich! In Kürze erhalten Sie eine Mail!");
			} else  if (data=="Fehler"){
				$('#page-wrapper').css('color','red'); 
				$('#page-wrapper').html('Ihr Username ist bereits vergeben!');
			} else {
			}
		})
	}
});

function setzeFarbenZurueck()
{
	$('#inputVorname').css('color','black');
	$('#inputNachname').css('color','black');
	$('#inputUsername').css('color','black');
	$('#inputStrasse').css('color','black');
	$('#inputWohnort').css('color','black');
	$('#inputHausnummer').css('color','black');
	$('#inputTele').css('color','black');
	$('.inputPasswort').css('color','black');
	$('#inputTele').css('color','black');
	$('#inputPLZ').css('color','black');
	$('.inputMail').css('color','black');
};

function testeVollstaendigkeit()
{
	var vorname = $("input[name='vorname']").val(); 
	var	nachname = $("input[name='nachname']").val();	
	var	username = $("input[name='username']").val();
	var	passwort = $("input[name='passwort']").val();
	var	passwort2 = $("input[name='passwortKontrolle']").val();
	var	wohnort = $("input[name='wohnort']").val();
	var	plz = $("input[name='plz']").val();
	var	strasse = $("input[name='strasse']").val();
	var	hausnummer = $("input[name='hausNr']").val();
	var	mail = $("input[name='mail']").val();
	var	mail2 = $("input[name='mailKontrolle']").val();
	var	tele = $("input[name='tele']").val();
	var eingabenVollstaendig = true;
	
	if(vorname=='')
	{
		$('#inputVorname').css('color','red');
		eingabenVollstaendig=false;
	}
	if(nachname=='')
	{
		$('#inputNachname').css('color','red');
		eingabenVollstaendig=false;
	}
	if(username=='')
	{
		$('#inputUsername').css('color','red');
		eingabenVollstaendig=false;
	}
	if(passwort=='')
	{
		$('.inputPasswort').css('color','red');
		eingabenVollstaendig=false;
	}
	if(wohnort=='')
	{
		$('#inputWohnort').css('color','red');
		eingabenVollstaendig=false;
	}
	if(plz=='')
	{
		for(var i=0; i < plz.length; i++)
		{
			if(hausnummer.charAt(i) > 0 && hausnummer.charAt(i) < 9)
			{
				eingabenVollstaendig = false;
			}
		}
		$('#inputPLZ').css('color','red');
		eingabenVollstaendig=false;
	}
	if(strasse=='')
	{
		$('#inputStrasse').css('color','red');
		eingabenVollstaendig=false;
	}
	if(hausnummer=='')
	{
		for(var i=0; i < hausnummer.length; i++)
		{
			if(hausnummer.charAt(i) > 0 && hausnummer.charAt(i) < 9)
			{
				eingabenVollstaendig = false;
			}
		}
		$('#inputHausnummer').css('color','red');
		eingabenVollstaendig=false;
	}
	if(mail=='')
	{
		if(mail.indexOf("@")== -1)
		{
			eingabenVollstaendig = false;
		}
		$('.inputMail').css('color','red');
		eingabenVollstaendig=false;
	}
	if(tele=='')
	{
		for(var i=0; i < hausnummer.length; i++)
		{
			if(hausnummer.charAt(i) > 0 && hausnummer.charAt(i) < 9)
			{
				eingabenVollstaendig = false;
			}
		}
		$('#inputTele').css('color','red');
		eingabenVollstaendig=false;
	}
	return eingabenVollstaendig;

};

//Überprüft die Login Daten, die der User eingegeben hat

$("#loginAnfrage").click(function(event){
	event.preventDefault();
	
	var username = $("input[name='usernameEingegeben']").val();
	var passwort = $("input[name='passwortEingegeben']").val();
	
	var posting = $.post("shopLoginSkript.php",{username:username, passwort:passwort});
	
	posting.done(function (data){
		alert(data);
		if(data=="Willkommen")
		{
			window.location = "warenkorb.php";
		}
	})
});

$("#logoutButton").click(function (event) {
	event.preventDefault();
	document.cookie ="loggedIn=no";
	window.location = "webshop.php";
});


//Ende der Registrierung und des Logins

//Beginn Verwalten der Webshop-Artikel

$("#neuenArtikelHinzufügen").click(function (event){
	event.preventDefault();
	var name = $("input[name=artikelNeu]").val();
	var preis =$("input[name=preisNeu]").val();
	var posting = $.post("artikelHinzufuegenSkript.php",{name:name, preis:preis});
	posting.done(function (data){
		if(data == "ja")
		{
			alert(data);		//TODO
		} else {	
			alert(data);		//TODO
		}
	});
});

$("#artikelLöschen").submit(function (Event){
	event.preventDefault();
	var artikelZumLöschen = new Array();
	var ctr=0;
	$('.toDelete:checked').each(function(){
		artikelZumLöschen[ctr] = ($(this)).attr('name');
		ctr++;
	});
	for(var i = 0; i < artikelZumLöschen.length; i++)
	{
		var name = artikelZumLöschen[i];
		alert(name);
		var posting = $.post("artikelLoeschenSkript.php", {name:name});
		posting.done(function (data){
			alert(data);	//Seite neu laden
		});
	}
});

//Ende Verwalten der Webshop-Aritkel

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

