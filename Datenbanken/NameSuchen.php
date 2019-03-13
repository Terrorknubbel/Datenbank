<html>
<body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php

    $servername = "localhost";
    $db = "id7616961_login";
    $username = "id7616961_terrorknubbel";
    $password = "robot";
    $Tabelle = "login";

    $mysqli = new mysqli($servername, $username, $password, $db);

    $sql = "SELECT * FROM $Tabelle WHERE name like '" . $_POST["anfang"] . "%'";
    $sql .= "order by Gehalt DESC";


    $res = mysqli_query($mysqli, $sql);
    $num = mysqli_num_rows($res);

    if ($num===0){echo "Keine passenden Datensätze gefunden"};
    if ($num===1){echo $num . "Datensatz wurde gefunden <br> <br>"};


    while ($dsatz = mysqli_fetch_assoc($res))
        echo $dsatz["name"] . ": " . $dsatz["Gehalt"] . "<br />";
    mysqli_close($mysqli);

    ?>
    <button type="button" onclick="home()" name="Home">Home</button>

    <script type="text/javascript">
      function home(){
        location.href = "db.php";
      }
    </script>
</body>
</html>
