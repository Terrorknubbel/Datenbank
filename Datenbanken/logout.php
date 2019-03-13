<?php
if(isset($_POST['Logout'])){
session_start();
session_destroy();
$_SESSION = array();
echo '<meta http-equiv="refresh" content="0.01; https://terrorknubbel.000webhostapp.com/db.php">';
}
 ?>
