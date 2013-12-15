<?php
		// Passwort und User aus Feld einlesen
	  $username = $_POST['username'];
      $password = $_POST['password'];
      
     
    session_start(); // Session starten

    
//DB-Abfrage ob User und PW übereinstimmen
	$db = mysqli_connect("localhost", "admin", "admin", "adminUser");
	 
	$sql = "SELECT password FROM userData WHERE username LIKE \"$username\"";
   $result = mysqli_query($db, $sql) or die(mysql_error());
   $md5password = mysqli_fetch_object($result)->password;
 
   
   if(!($md5password==md5($_POST['password']))) {
        echo "<span style=\"color: red;\">Falscher Username oder Passwort! Bitte versuchen Sie es erneut!</span>";
   }
   else {
       $_SESSION['angemeldet'] = true;

       // Weiterleitung zur geschützten Startseite
       echo "Success"; // Weiterleitung geht nicht direkt über Php header da sonst die Seite nicht gewechselt wird.
       }


?>