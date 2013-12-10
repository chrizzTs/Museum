<?php
$db = mysqli_connect("localhost", "admin", "admin", "guestbook");
$name = $_POST['name'];
$email = $_POST['email'];
$post = $_POST['post'];

if($name!='' &&  $email != '' && $post!=''){
$eintragen = mysqli_query($db, "INSERT INTO entries (name, email, post) VALUES ('$name', '$email', '$post')");
}

header("Location: guestbook.php");
die();


php?>