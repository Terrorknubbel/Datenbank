<html>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <?php

    $mysqli = mysqli_connect("","root");
    mysqli_select_db($mysqli, "adressen");
    $mysqli->set_charset("utf8");

    ?>
        <input type="text" name="name" required /> Name<br/>
        <input type="text" name="wohnort" required /> Wohnort<br/>
        <input type="text" name="plz" required /> PLZ<br/>
        <input type="text" name="gehalt" required /> Gehalt<br/>
        <input type="submit" name="speichern" value="Speichern" />
        <button type="button" onclick="home()" name="Home">Home</button>

        <script type="text/javascript">
          function home(){
            location.href = "index.php";
          }
        </script>

    <?php
        if (isset($_POST['speichern'])) {
            $name = $mysqli->escape_string($_POST["name"]);
            $wohnort = $mysqli->escape_string($_POST["wohnort"]);
            $plz = $mysqli->escape_string($_POST["plz"]);
            $gehalt = $mysqli->escape_string($_POST["gehalt"]);

            $sql = "INSERT INTO adressen1";
            $sql .= "(name, wohnort, plz, gehalt)";
            $sql .= " VALUES ";
            $sql .= "('$name','$wohnort','$plz','$gehalt')";
            $mysqli->query($sql);
            header( "refresh:0.1;url=index.php" );

        };

        $sql = "SELECT * From adressen ORDER BY Name";
        $result = $mysqli->query($sql);



    ?>
    </form>


</body>
</html>
