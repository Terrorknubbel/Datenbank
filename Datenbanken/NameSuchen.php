<html>
<body>
    <?php

    $con = mysqli_connect("","root");
    mysqli_select_db($con, "adressen");

    $sql = "SELECT * FROM adressen1 WHERE name like '" . $_POST["anfang"] . "%'";
    $sql .= "order by Gehalt DESC";


    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);
    echo $num . " Datensätze wurde gefunden <br/> <br/>";
    if ($num==0) { echo "Keine passenden Datensätze gefunden";}

    while ($dsatz = mysqli_fetch_assoc($res))
        echo $dsatz["name"] . ": " . $dsatz["Gehalt"] . "<br />";
    mysqli_close($con);

    ?>
    <button type="button" onclick="home()" name="Home">Home</button>

    <script type="text/javascript">
      function home(){
        location.href = "index.php";
      }
    </script>
</body>
</html>
