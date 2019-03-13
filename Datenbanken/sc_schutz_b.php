<?php
  session_start();
  if(isset($_POST["n"]))
  {
    if($_POST["n"] == "Hans" && $_POST["p"] == "bingo")
    {
      $_SESSION["n"] = $_POST["n"];
    }
  }

  if (!isset($_SESSION["n"]))
  {
    exit("<p>Kein Zugang<br><a href='Login.php'>Zum Login</a></p>");
  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h3> Intro-Seite </h3>
     <?php
     echo "<p>Hallo " . $_SESSION["n"] . "</p>";

      ?>
      <p>test</p>
   </body>
 </html>
