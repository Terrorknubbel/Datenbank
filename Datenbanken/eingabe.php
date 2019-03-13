
<?php

$servername = "localhost";
$db = "id7616961_login";
$username = "id7616961_terrorknubbel";
$password = "robot";
$Tabelle = "login";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $db);

$sql = "SELECT * FROM  $Tabelle WHERE gehalt >= " . $_POST["ug"] . " and gehalt <= " . $_POST["og"] ;
$sql .= " order by Gehalt";

$res = mysqli_query($mysqli, $sql);
$num = mysqli_num_rows($res);
echo $num . " Datensätze wurde gefunden <br/> <br/>";
if ($num==0) { echo "Keine passenden Datensätze gefunden";}

while ($dsatz = mysqli_fetch_assoc($res)){

    echo $dsatz["name"] . ": " . $dsatz["Gehalt"] . "€". "<br />";
};


?><br>
<button type="button" onclick="home()" name="Home">Home</button>

<script type="text/javascript">
  function home(){
    location.href = "db.php";
  }
</script>
