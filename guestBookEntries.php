<?php
$db = mysqli_connect("localhost", "admin", "admin", "guestbook");
$ergebnis = mysqli_query($db, "Select * from entries");


$count = 1;

while($row = mysqli_fetch_object($ergebnis))
{
	echo "<p>", $count, "<br>\n";
	echo $row->date, "<br>\n";
	echo $row->name, "<br>\n";
	echo $row->email, "<br>\n";
	echo $row->post, "<br></p>\n";

	
  $count++;
}

?>