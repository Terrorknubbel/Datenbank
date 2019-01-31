<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Datenbank</title>
  </head>
  <body>

    <div id="db">
    <h2>Datenbank: </h2>

    <select class="" name="">
      <option value="">adressen1</option>
      <option value="">adressen2</option>
    </select>

    <?php

    $Tabelle = "adressen1";

    $mysqli = mysqli_connect("","root");
    mysqli_select_db($mysqli, "adressen");
    if ($mysqli->connect_errno) {
        echo "Keine DB-Verbindung: ({$mysqli->connect_errno}) " . $mysqli->connect_error;
    }
    $result = $mysqli->query("SELECT * FROM $Tabelle order by ID");
    echo "<br><br>";
    echo "<table>";
    echo "<tr>";
    echo "<th></th><th>ID</th><th>Name</th><th>Gehalt</th><th></th>";
    echo "</tr>";

    $del = 0;
    $change = 0;
    while ($adresse = $result->fetch_assoc()) {
      $del += 1;
      $change -= 1;
      ?><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST"><?php
      echo "<tr>";
        echo "<td><input type='submit' name='$change' value='Bearbeiten'></input></td>";
        echo "<td>$adresse[id]</td>";
        echo "<td>$adresse[name]</td>";
        echo "<td>$adresse[Gehalt]€</td>";
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
        header( "refresh:0.1;url=index.php" );
        };

        if ($change < 0){
          $name = $name*-1;
          $row = $name -1;

          $result = $mysqli->query("SELECT * FROM $Tabelle LIMIT $row,1");
          $adresse = $result->fetch_assoc();

          $id = $adresse["id"];
          $name = $adresse["name"];
          $gehalt = $adresse["Gehalt"];

          echo "<div id='change'>";
          echo "<form action='change.php' method='post'>";
          echo "<input type='text' name='id' id='aus' value='$id'  /><span id='id'>ID</span><br/>";
          echo "<input type='text' name='name' value='$name' required /><span id='name'>Name</span><br/>";
          echo "<input type='text' name='gehalt' value='" . $gehalt . "€' required /> Gehalt<br/>";

          echo "</div><br>";
          echo '<input type="submit" value="Speichern" /><br><br>';
          echo "</form>";



        };

        };
    };

    ?>
    <br>

  <form action="DBEintragen.php" method="POST">
  <input type="submit" name="eintragen" value="Hinzufügen" />

  </form>
  <br>
  </div>
  <article id="rechts">
  <p>Anzeige der Personen mit einem Gehalt zwischen:</p>
  <form action ="eingabe.php" method="POST">
      <p> Untergrenze: </p>
      <p><input name="ug" required /></p>
      <p> Obergrenze: </p>
      <p><input name="og" required /></p>

      <p><input type="submit" /> <input type="reset" /></p>

  </form>

  <hr>

  <p>Anzeige der Personen mit folgendem Namensanfang:</p>
  <form action ="NameSuchen.php" method="POST">
      <p><input name="anfang" /></p>
      <p><input type="submit" /> <input type="reset" /></p>
  </form>
  <hr>

  <h3> ---Eintrag Löschen--- </h3>
  Geben Sie die ID von dem Eintrag ein den Sie löschen möchten:<br><br>
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <input type="int" name="test" value=""><br><br>
  <input type="submit" name="loeschen" value="Eintrag löschen">
  <br><br>
  <?php

  if (isset($_POST['loeschen'])) {

    $id = $_POST['test'];
    $adresse = $result->fetch_assoc();
    $result = $mysqli->query("DELETE FROM $Tabelle WHERE id = $id");
    header( "refresh:0.1;url=index.php" );
  };
  ?>

  </form>

  </article>
  </body>
</html>
