
<?php

$con = mysqli_connect("","root");
mysqli_select_db($con, "adressen");

$sql = "SELECT * FROM  adressen1 WHERE gehalt >= " . $_POST["ug"] . " and gehalt <= " . $_POST["og"] ;
$sql .= " order by Gehalt";

$res = mysqli_query($con, $sql);
$num = mysqli_num_rows($res);
echo $num . " Datensätze wurde gefunden <br/> <br/>";
if ($num==0) { echo "Keine passenden Datensätze gefunden";}

while ($dsatz = mysqli_fetch_assoc($res)){

    echo $dsatz["name"] . ": " . $dsatz["Gehalt"] . "€". "<br />";
};
mysqli_close($con);

?><br>
<button type="button" onclick="home()" name="Home">Home</button>

<script type="text/javascript">
  function home(){
    location.href = "index.php";
  }
</script>
