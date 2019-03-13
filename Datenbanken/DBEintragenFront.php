<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">

<h3>Datensatz hinzufügen</h3>
<form action="DBEintragen.php" method="POST">
  <p><input type="text" name="id" disabled value="id"></p>
<?php
include("Connect.php");
if(isset($_COOKIE['value'])){
  $Tabelle = $_COOKIE['value'];
};
$count = 0;
$result = $mysqli->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='$Tabelle'");
while ($db = $result->fetch_assoc()) {

array_push($header, $db["COLUMN_NAME"]);
};
foreach (array_slice($header, 1) as $value) {
  $count += 1;
  echo"<p><input type='text' name='$count' placeholder='$value'/></p>";
};
 ?>

<input type="submit" name="speichern" value="Speichern" />
</form>
