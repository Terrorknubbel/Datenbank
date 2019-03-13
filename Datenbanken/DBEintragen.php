
<?php

try {
  $value1 = $_POST['1'];
  $value2 = $_POST['2'];
  $value3 = $_POST['3'];
  $value4 = $_POST['4'];
  $value5 = $_POST['5'];
}

catch(Exception $e) {

}


include("Connect.php");
$mysqli->set_charset("utf8");

$header = array();

$result = $mysqli->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='$Tabelle'");

while ($db = $result->fetch_assoc()) {

array_push($header, $db["COLUMN_NAME"]);

};


$sql = "INSERT INTO $Tabelle";
$sql .= "($header[2], $header[3])";
$sql .= " VALUES ";
$sql .= "('$value2', '$value3')";
$mysqli->query($sql);


?>
