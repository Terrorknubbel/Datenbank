<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<?php


include("Connect.php");
if(isset($_COOKIE['value'])){
  $Tabelle = $_COOKIE['value'];
};
$result = $mysqli->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='$Tabelle'");

echo "<br>";
echo "<table>";
echo "<tr>";
echo "<th></th>";
while ($db = $result->fetch_assoc()) {

array_push($header, $db["COLUMN_NAME"]);
echo "<th>$db[COLUMN_NAME]</th>";

};

echo "</tr>";
$result = $mysqli->query("SELECT * FROM $Tabelle order by id");
$del = 0;
$change = 0;
while ($adresse = $result->fetch_assoc()) {
  $del += 1;
  $change -= 1;
  ?><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST"><?php
  echo "<tr>";
    echo "<td><input type='submit' name='$change' value='Bearbeiten'></input></td>";
    foreach ($header as $value) {
      echo "<td>$adresse[$value]</td>";
    };
    echo "<td><input type='submit' name='$del' value='Löschen'></input></td>";
  echo "</tr>";
  ?></form><?php
};
echo "</table>";
echo "<br>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach($_POST as $name => $content) {

    if ($name > 0){

    $row = $name -1;

    $result = $mysqli->query("SELECT id FROM $Tabelle LIMIT $row,1");
    $adresse = $result->fetch_assoc();
    $del = $adresse["id"];
    $result = $mysqli->query("DELETE FROM $Tabelle WHERE id = $del");
    Header("Location:list.php");
    };


    };
};

?>
