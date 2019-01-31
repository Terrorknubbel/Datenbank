<?php


$name = $_POST['name'];
$gehalt = $_POST['gehalt'];
$id = $_POST['id'];



$mysqli = mysqli_connect("","root");
mysqli_select_db($mysqli, "adressen");
$mysqli->set_charset("utf8");


$sql = "UPDATE adressen1 SET name='$name', gehalt='$gehalt' WHERE id = '$id'";
$mysqli->query($sql);

header( "refresh:0.1;url=index.php" );
 ?>
