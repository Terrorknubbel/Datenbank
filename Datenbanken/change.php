<?php


$name = $_POST['name'];
$gehalt = $_POST['gehalt'];
$id = $_POST['id'];


$servername = "localhost";
$db = "id7616961_login";
$username = "id7616961_terrorknubbel";
$password = "robot";
$Tabelle = "login";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $db);
$mysqli->set_charset("utf8");


$sql = "UPDATE $Tabelle SET name='$name', gehalt='$gehalt' WHERE id = '$id'";
$mysqli->query($sql);

header( "refresh:0.1;url=db.php" );
 ?>
