<?php
  //session_start();
  // Create connection
  /*$mysqli = mysqli_connect("","root");
  mysqli_select_db($mysqli, "");
  $result = $mysqli->query("SELECT Username, Passwort FROM $Tabelle");
  $out = $result->fetch_assoc();
  $Username = $out["Username"];
  $Passwort = $out["Passwort"];
  $Pwhash = sha1($_POST["p"]);
  if(isset($_POST["n"]))
  {
    if($_POST["n"] == $Username && $Pwhash == $Passwort)
    {
      $_SESSION["n"] = $_POST["n"];
      echo '<meta http-equiv="refresh" content="0.01; https://terrorknubbel.000webhostapp.com/db.php">';
    }
  }

  if (!isset($_SESSION["n"]))
  {
    include("login.php");
    exit ("<p>Bitte loggen Sie sich ein.</p><p>Falls Sie noch keinen Account besitzen, wenden Sie sich an den Administrator.</p>");

  }*/
 ?>

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
      function TableChange() {
        var value = document.getElementById("select").value;
        document.cookie = "value=" + value;
        document.getElementById('iframeID').contentWindow.location.reload();
        document.getElementById('iframeID2').contentWindow.location.reload();
        document.getElementById('iframeID3').contentWindow.location.reload();
      };
    </script>

    <title>Datenbank</title>
  </head>
  <body>

  <?php
  include("Connect.php");
   ?>

  <div id="db">
    <form action="logout.php" method="POST" id="logout">
      <input type="submit" name="Logout" value="Logout">
    </form>
    <h2>Datenbank: <?php echo"$Datenbank";?></h2>

    <h3>Tabelle:
      <select onchange="TableChange()" id="select">
        <?php
        $result = $mysqli->query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES");
        while ($db = $result->fetch_assoc()) {
          echo "<option name=$db[TABLE_NAME]>$db[TABLE_NAME]</option>";
        };
         ?>
      </select>
    </h3>

    <iframe id="iframeID" src="list.php" height="300" width="500"></iframe>
    <br>
    <iframe id="iframeID2" src="DBEintragenFront.php" height="300" width="500"></iframe>
    <br>
    <iframe id="iframeID3" src="AddTableFront.php" height="300" width="500"></iframe>

  </div>

  </body>
</html>
