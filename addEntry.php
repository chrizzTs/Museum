<?php
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");

$absendername = htmlspecialchars($_POST["name"]);
$absendermail = $_POST["email"];
$eingabe = htmlspecialchars($_POST["eingabe"]);

if(!empty($absendername) and !empty($absendermail) and !empty($eingabe) and filter_var($absendermail, FILTER_VALIDATE_EMAIL))
{
$db = mysqli_connect("localhost", "admin", "admin", "guestbook");
$name = $_POST['name'];
$email = $_POST['email'];
$post = $_POST['eingabe'];

$eintragen = mysqli_query($db, "INSERT INTO entries (name, email, post) VALUES ('$absendername', '$absendermail', '$eingabe')");
echo "Eintrag wurde versandt!";
}
else
echo  "<p style=\"color:red\">Eingabefehler, Versuchen sie es Nocheinmal</p>";
?>