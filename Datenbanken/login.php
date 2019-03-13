<?php
  session_start();
  session_destroy();
  $_SESSION = array();

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Login</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style media="screen">
     button[value=Löschen] {
       border-radius: 20px;
       font-family: monospace;
       font-size: 1.3em;
       background-color: red;
     }

     input[type=submit], input[type=reset] {
       border-radius: 20px;
       font-family: monospace;
       font-size: 1.3em;
       background-color: lightblue;
     }

     input {
       background-color: #d0f5ed;
     }

     </style>
   </head>
   <body>
     <h3> Login </h3>
     <form action="db.php" method="post">
       <p><input name="n" /> Name </p>
       <p><input type="password" name="p" /> Passwort </p>
       <input type="submit" value="Login" />
     </form>
   </body>
 </html>
