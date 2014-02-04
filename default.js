//Diese Datei wird durch den Footer auf jede Seite des Webauftritts eingebunden. Hier befindet sich also sämtliche Funktionalität des Webauftritts unterteilt in verschiedene Kategorien

//EventHandeler..............

//Wird immer beim Laden der WEbsite automatisch aufgerufen und ausgeführt
$(document).ready(function(){

	loadData();
	windowSize();
});

//Passt das Format der Website entsprechend der Bildschirmgröße an
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
 	
 	//Sendet die Login-Daten des Users an das PHP "Login.php" Skript um die Authentifizierung zu prüfen.
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

// Bewerbungsformular Post und Echo Injection
$( "#formApplication" ).submit(function( event ) {
 	event.preventDefault();
 	
 	var lastname = $("#name").val();
 	var firstname = $("#firstname").val();
 	var sex = $("#sex").val();
 	var title = $("#title").val();
 	var addname = $("#addname").val();
 	var birthday = $("#birthday").val();
 	var birthcountry = $("#birthcountry").val();
 	var nationality= $("#name").val();
 	var mail= $("#mail").val();
 	var family= $("#family").val();
 	var input = $("#input").val();
 	var dropzone = $("#dropzone").val();
 	
 	$.post("upload.php", dropzone);
 	
   var posting = $.post( "RecrutingSkript.php", {lastname:lastname, firstname:firstname, sex:sex, title:title, addname:addname, birthday:birthday, birthcountry:birthcountry, nationality:nationality, mail:mail,  family:family, input:input});
   posting.done(function( data ) {
	  $("#replyPost").html(data);
	  $("#kontaktform").hide("fast");
	 
	  
	});

	
});

//Asynchrone Webshop Abfrage zum Laden neuer Artikel
$("#AjaxWebShopAbfrage").click(function(event) {
	event.preventDefault();
	
	var parent = document.getElementById("vonAnfangAn");
	var posting = $.post("anzahlDerVerfügbarenArtikel.php")	//Abfrage der Anzahl der Einträge in der products DB
	posting.done(function (data) {
		data++;
		if(parent.childNodes.length >= data)				//sobald die Anzahl der angezeigten Elemente gleich der Anzahl der DB Einträge ist, Button verstecken
		{
			$("#AjaxWebShopAbfrage").hide();
		}
	});
	
	var posting = $.post( "webshopSkript.php");				//Generieren und Ausgeben des neuen Artikelelements
	posting.done(function (data ) {
		var toBeAdded = data;
		$('#vonAnfangAn').append(toBeAdded);
	});
	
});

//Registrieren, Login und Logout.........


//ändert die Seite, nachdem registrieren im WebShop geklickt wurde
$('.ImShopRegistrieren').click(function(event){		//Die Webshop Maske wird aus- und das Formular zum Registrieren eingeblendet
	event.preventDefault();
	$(".wirdZumRegistrierenGeladen").css('display','block');
	$(".wirdZumLoginGeladen").css('display','none');
	$('.vonAnfangAn').css('display','none');
	$('.webshopItem').css('display','none');
	$("#forButtonMehrAnzeigen").html('');
});


//ändert die Seite, nachdem Login im WebShop geklickt wurde
$('.ImShopEinloggen').click(function(event){	//die Webshop Maske wird aus- und das Formular zum Einloggen wird eingeblendet
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
 	
 	//Falls schon einmal versucht wurde, Daten einzugeben weírd die Farbe der Beschriftung der Eingabefelder auf default=schwarz zurückgesetzt
 	setzeFarbenZurueck();

 	//Daten werden auf Vollständigkeit und KOnsistenz geprüft
 	 var eingabenVollstaendig = testeVollstaendigkeit();
 	 
 	//Daten werden eingelesen
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
	
	//Falls die Eingaben nicht vollständig sind, wird es dem User in Rot mitgeteilt
	if(!eingabenVollstaendig)
	{
		$('#page-wrapper').css('color','red'); 
		$('#page-wrapper').html('Die Eingaben sind nicht vollständig!');
	}
	
	//Falls die Passwörter nicht identisch sind, wird das dem User in rot mitgeteilt
	if(passwort != passwort2)
	{
		$('#page-wrapper').css('color','red'); 
		$('.inputPasswort').css('color','red');
		$('#page-wrapper').html('Passwörter stimmen nicht überein!');		
	}
	
	//Falls die Mail-Adressen nicht identisch sind, wird das dem User in rot mitgeteilt
	if(mail != mail2)
	{
	 	$('#page-wrapper').css('color','red');
	 	$('.inputMail').css('color','red');
		$('#page-wrapper').html('Mail-Adressen stimmen nicht überein!');
	}
	
	//Falls alle Eingaben den Vollständigkeits- und Konsistenzanforderungen entsprechen, wird ein User mit dem newUser.php Skript in der shopUser Tabelle angelegt
	if(mail == mail2 && passwort == passwort2 && eingabenVollstaendig)
	{
	
		//Aufruf des Skripts und Übergabe der Daten
		var posting = $.post("newUser.php?action=insert", {vorname: vorname, nachname: nachname, username: username, passwort: passwort, wohnort : wohnort, plz : plz, strasse : strasse, hausNr : hausnummer, mail : mail, tele : tele});
		
		//Auswerten der Rückhgabe des Skripts
		posting.done(function (data){
		
			//Alles hat funktioniert, die erfolgreiche Registrierung wird dem User mitgeteilt
			if(data=="funktioniert")
			{
				$('#page-wrapper').css('font-color','black');
				$('#page-wrapper').css('font-style','bold');
				$('#page-wrapper').html('Vielen Dank für Ihre Registrierung');
				$("#wrapper").html("Anmeldung erfolgreich! In Kürze erhalten Sie eine Mail!");
				
			//Der Username ist bereits vergeben, es wird nach einem neuen gefragt
			} else  if (data=="Fehler"){
				$('#page-wrapper').css('color','red'); 
				$('#page-wrapper').html('Ihr Username ist bereits vergeben!');
			} else {
			}
		})
	}
});

function setzeFarbenZurueck()	//wird bei jedem Versuch des Registrierens aus der registrieren.html durch die obige Funktion aufgerufen, um alle Eingaben wieder auf schwarz zu setzen.
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

function testeVollstaendigkeit()	//testet ob alle Eingaben des Registrierens vollständig und konsistent sind	mit Regexen und if-Bedingungen
{
	var vorname = $("input[name='vorname']").val();					 //Darf nur Aus Groß- und Kleinbuchstaben bestehen
	var	nachname = $("input[name='nachname']").val();				//Darf nur Aus Groß- und Kleinbuchstaben bestehen
	var	username = $("input[name='username']").val();				//Darf nur einmal vergeben werden und nicht leer sein
	var	passwort = $("input[name='passwort']").val();				//Darf nur aus mindestens 8 Zeichen bestehen, mindestens einen kleinen
	var	passwort2 = $("input[name='passwortKontrolle']").val();		// und einen großen Buchstaben sowie eine Zahl enthalten
	var	wohnort = $("input[name='wohnort']").val();					//Darf nur Aus Groß- und Kleinbuchstaben bestehen
	var	plz = $("input[name='plz']").val();							//Darf nur aus einer 5 stelligen Zahl bestehen
	var	strasse = $("input[name='strasse']").val();					//Darf nur aus Groß- und Kleinbuchstaben bestehen und maximal einen Punkt bzw. drei Bindestriche enthalten
	var	hausnummer = $("input[name='hausNr']").val();				//Darf nur aus einer Zahl>0 bestehen und maximal einen kleinen Buchstaben als Zusatz haben
	var	mail = $("input[name='mail']").val();						//Muss ein @ enthalten und an 3. oder 4. letzter Stelle einen . enthalten.
	var	mail2 = $("input[name='mailKontrolle']").val();				
	var	tele = $("input[name='tele']").val();						//Darf nur aus Zahlen bzw. einem . / - oder Leerzeichen bestehen
	var eingabenVollstaendig = true;								//wird false, sobald eine der o.g. Bedingungen nicht erfüllt ist
	
	//Jeder Wert wird als erstes überprüft, ob der leer ist. Falls ja, ist die Eingabe IMMER ungültig
	
	//Vorname
	if(vorname=='')
	{
		$('#inputVorname').css('color','red');
		eingabenVollstaendig=false;
	} else if (!vorname.match(/^[a-z|A-Z|ö|ü|ä|Ö|Ü|Ä|ß]+$/)) {		//Test, ob nur Buchstaben (klein und groß)
		$('#inputVorname').css('color','red');
		eingabenVollstaendig=false;
	}

	//Nachname
	if(nachname=='')
	{
		$('#inputNachname').css('color','red');
		eingabenVollstaendig=false;
	} else if (!nachname.match(/^[a-z|A-Z|ö|ü|ä|ß|Ö|Ü|Ä]+$/)) {		//Test, ob nur Buchstaben (klein und groß)
		$('#inputNachname').css('color','red');
		eingabenVollstaendig=false;
	}
	
	//Username
	if(username=='')
	{
		$('#inputUsername').css('color','red');
		eingabenVollstaendig=false;
	}
	
	//Passwort
	if(passwort=='')
	{
		$('.inputPasswort').css('color','red');
		eingabenVollstaendig=false;
	} else{
		var enthaeltZahl = false;							//müssen nach übeprüfen der Buchstaben alle true sein, damit ein konformes Passwort eingegeben wurde
		var enthaeltKleinbuchstabe = false;
		var enthaeltGroßbuchstabe = false;
		var enstprichtDerLaenge = false;
		
		if(passwort.length>=8)								//Test, ob Länge korrekt ist
		{
			enstprichtDerLaenge = true;
			for(var i=0; i<passwort.length; i++)			//iteriert durch alle Zeichen des Wortes
			{
				var tmp = passwort.charAt(i);
				if(tmp.match(/^[1-9]+$/))					//Test, ob eine Zahl enthalten ist
				{
					enthaeltZahl = true;
				} else if(tmp.match(/^[a-z]+$/)) {			//Test, ob ein Kleinbuchstabe enthalten ist
					enthaeltKleinbuchstabe = true;
				} else if(tmp.match(/^[A-Z]+$/)) {			//Test, ob ein Großbuchstabe enthalten ist
					enthaeltGroßbuchstabe = true;
				}
			}
		}
		if(!enthaeltZahl || !enthaeltGroßbuchstabe || !enthaeltKleinbuchstabe || !enstprichtDerLaenge)	//Falls eine Bedingung nicht erfüllt, Passwort nicht akzeptieren
		{
			$('.inputPasswort').css('color','red');
			$('#page-wrapper').html('Das Passwort muss aus mindestens 8 Zeichen, einem kleinen und einem großen Buchstaben sowie einer Zahl bestehen!');
			eingabenVollstaendig=false;
		}
	}
	
	//Wohnort
	if(wohnort=='')
	{
		$('#inputWohnort').css('color','red');
		eingabenVollstaendig=false;
	} else {
		var ctr=0;
		if(!wohnort.match(/^[a-z|A-Z|ö|ä|ü|Ö|Ä|Ü|ß]+$/))	//Test, ob nur Klein- und Großbuchstaben verwendet wurden
		{
			$('#inputWohnort').css('color','red');
			eingabenVollstaendig=false;
		}
	}
	
	//Postleitzahl
	if(plz=='')
	{
		$('#inputPLZ').css('color','red');
		eingabenVollstaendig=false;
	} else if (plz.length != 5){							//Test, ob genau 5 Zeichen verwendet wurden
		$('#inputPLZ').css('color','red');
		eingabenVollstaendig=false;
	} else if (isNaN(plz)){									//Test, ob nur Zahlen enthalten sind
		eingabenVollstaendig = false;
		$('#inputPLZ').css('color','red');
	}
	
	//Straße
	if(strasse=='')
	{
		$('#inputStrasse').css('color','red');
		eingabenVollstaendig=false;
	} else {
	
		//ctr zum Zählen der Sonderzeichen
		var punktCtr = 0;
		var bindestrichCtr = 0;
		
		for(var i=0; i<strasse.length; i++)					//iteriert durch alle Zeichen des Wortes
		{
			var tmp = strasse.charAt(i);
			if(isNaN(tmp))
			{
				if(tmp =="." && punktCtr <1){				//Test, ob maximal ein Punkt enthalten ist
					punktCtr++;
				} else if(tmp =="-" && bindestrichCtr <3)
				{
					bindestrichCtr++;						//Test, ob maximal drei Bindestriche einthalten sind
				} else if (punktCtr >=1 || bindestrichCtr >=3){
					$('#inputStrasse').css('color','red');
					eingabenVollstaendig=false;
				}
			} else {										//Falls eine Zahl enthalten ist, wird der eingegebene Wert abgelehnt
				$('#inputStrasse').css('color','red');
				eingabenVollstaendig=false;
			}
		}
	}
	
	//Hausnummer
	if(hausnummer=='')
	{
		eingabenVollstaendig = false;
		$('#inputHausnummer').css('color','red');
	} else if ( hausnummer=="0"){						//Falls Hausnummer = 0, wird diese abgelehnt
		eingabenVollstaendig = false;
		$('#inputHausnummer').css('color','red');
	}else{
		var ctr = 0;
		for(var i=0; i < hausnummer.length; i++)		//iteriert durch jedes eingegebene Zeichen und überprüft ob es zwischen 0 und 9 liegt oder maximal ein zeichen zwischen a und z ist.
		{
			if(hausnummer.charAt(i) >= 0 && hausnummer.charAt(i) <= 9	|| hausnummer.charAt(i) >= "a" && hausnummer.charAt(i)<="z" && ctr < 1)
			{
				if(hausnummer.charAt(i)>="a" && hausnummer.charAt(i)<="z") {
					ctr++;
				}
			} else {
				eingabenVollstaendig = false;
				$('#inputHausnummer').css('color','red');
			}
		}
	}
	
	//Mail
	if(mail=='')
	{
		$('.inputMail').css('color','red');
		eingabenVollstaendig=false;
	} else {
		if(mail.indexOf("@")== -1)					//Test, ob @ enthalten ist
		{
			$('.inputMail').css('color','red');
			eingabenVollstaendig = false;
		} else if (mail.charAt(mail.length-4) != "." && mail.charAt(mail.length-3)!= ".") {		//Test, ob an 3.-letzter (.de) oder 4.letzter (.com) Stelle ein Punkt ist
			$('.inputMail').css('color','red');
			eingabenVollstaendig = false;
		}
	}
	
	//Telefonnummer
	if(tele=='')
	{
		$('#inputTele').css('color','red');
		eingabenVollstaendig=false;
	} else {
	
		//Zähler für Sonderzeichen
		var ctr=0;
		for(var i=0; i < tele.length; i++)
		{
			var tmp = tele.charAt(i);
			if(isNaN(tmp))
			{
				if((tmp == "." || tmp =="/" ||tmp == "-"||tmp ==" ") && ctr <1 )		//Test, ob maximal ein . oder / oder - oder Leerzeichen verwendet wurde
				{
					ctr++;
				} else {

					eingabenVollstaendig = false;
					$('#inputTele').css('color','red');
 				} 
			} else {
			}
		}
	}
	
	//Ausgabe
	return eingabenVollstaendig;

};


//Überprüft die Login Daten, die der User eingegeben hat und wird nach Betätigend der Schaltfläche Login im Webshop-Login Interface aufgerufen
$("#loginAnfrage").click(function(event){
	event.preventDefault();
	
	var username = $("input[name='usernameEingegeben']").val();
	var passwort = $("input[name='passwortEingegeben']").val();
	
	var posting = $.post("shopLoginSkript.php",{username:username, passwort:passwort});		//Eingabe wird im shopLoginSkript.php überprüft und ggf. der Cookie gesetzt
	
	posting.done(function (data){
		if(data=="Willkommen")				//Falls login geklappt hat, wird in den Warenkorb des eingeloggten Benutzers weitergeleitet
		{
			window.location = "warenkorb.php";
		}
	})
});

//Loggt den user aus, indem der "logged-In" Cookie auf no gesetzt wird, außerdem wird in den Webshop weitergeleitet
$("#logoutButton").click(function (event) {
	event.preventDefault();
	document.cookie ="loggedIn=no";
	window.location = "webshop.php";
});

//Ende der Registrierung, des Logins und des Logouts

//Beginn Verwalten der Webshop-Artikel

$("#neuenArtikelHinzufügen").click(function (event){	//Ein neuer Artikel wird hinzugefügt
	event.preventDefault();
	var name = $("input[name=artikelNeu]").val();
	var preis =$("input[name=preisNeu]").val();
	var posting = $.post("artikelHinzufuegenSkript.php",{name:name, preis:preis});	//artikelHinzufuegenSkript.php wird mit den neuen Daten aufgerufen ohne Konsistenzprüfung, das wird dem Admin überlassen
	
	//Auswertung der Rückgabe des Skripts
	posting.done(function (data){
		if(data == "ja")
		{
			alert("Neuer Artikel in die Datenbank aufgenommen.");
		} else {
			alert("Es ist ein Fehler aufgetreten, bitte versuchen Sie es noch einmal.");
		}
	});
});

$("#artikelLöschen").submit(function (Event){		//Ein Artikel wird gelöscht
	event.preventDefault();
	
	//Alle Artikel, deren Checkbox ausgewählt ist, werden in ein Array gefüllt
	var artikelZumLöschen = new Array();
	var ctr=0;
	$('.toDelete:checked').each(function(){
		artikelZumLöschen[ctr] = ($(this)).attr('name');
		ctr++;
	});
	
	//für jedes Array Element wird das artikelLoeschenSkript.php aufgerufen und der Name des zu löschenden Artikels übergeben
	for(var i = 0; i < artikelZumLöschen.length; i++)
	{
		var name = artikelZumLöschen[i];
		var posting = $.post("artikelLoeschenSkript.php", {name:name});
		posting.done(function (data){
			window.location = "shopVerwaltung.php";
		});
	}
});

//Ende Verwalten der Webshop-Artikel



//Gästebuch Eintrag Post und Echo Injection
$( "#guestbookForm" ).submit(function( event ) {
 	event.preventDefault();
 	 
 	//Sammelt dien Daten der Input Fields und speichert diese temporär als variablen ab
 	var name = $("input[name='name']").val();
 	var email = $("input[name='email']").val();
 	var eingabe = $("textarea[name='eingabe']").val();
 	 	
 	//Sendet die Variablen an das PHP Skrip addEntry.php um diese dort zu verarbeiten
   var posting = $.post( "addEntry.php", {name:name, email:email, eingabe:eingabe});
   posting.done(function( data ) {
	  $("#replyGuestbookEntry").html(data);
	  //Nachdem ein neuer Eintrag erstellt wurde, sollen alle Einträge über Ajax aktualisiert werden.
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

