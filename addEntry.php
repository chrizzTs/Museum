<?php


$name = $_POST['name'];
$email = $_POST['email'];
$post = $_POST['eingabe'];


if(!empty($name) and !empty($email) and !empty($post) and filter_var($email, FILTER_VALIDATE_EMAIL))
{

$con = mysqli_connect("localhost", "admin", "admin", "guestbook");




// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$sql = "INSERT INTO entries (name, email, post) VALUES ('$name', '$email', '$post')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
 
echo "<p style=\"color:red\">Eintrag erfolgreich!</p>";


mysqli_close($con);


} else{
  echo  "<p style=\"color:red\">Eingabefehler, versuchen Sie es erneut.</p>";
  }
?>