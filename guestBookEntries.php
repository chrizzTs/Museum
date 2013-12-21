<?php


$db = mysqli_connect("localhost", "admin", "admin", "guestbook");
$ergebnis = mysqli_query($db, "Select * from entries");



$count = 1;

while($row = mysqli_fetch_object($ergebnis))
{
	echo "<p><b>", $count, "</b><br>\n";
	echo utf8_encode($row->date), "<br>\n";
	echo utf8_encode($row->name), "<br>\n";
	echo utf8_encode($row->email), "<br>\n";
	echo utf8_encode($row->post), "<br></p>\n";

	
  $count++;
}

?>