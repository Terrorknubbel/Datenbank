<html>
<body>
<?php 

function login($database) {
    $server = "localhost";
    $user = "user";
    $password = "passwort";
    $database = "AdressDB";

    $mysqli = new mysqli($server,$user,$password,$database);
    if ($mysqli->connect-errno) {
        echo "Keine DB-Verbindung: ({$mysqli->connect_errno}) " . $mysqli->connect_error;
    }

    $mysqli->set_charset("utf8");
    return $mysqli;
}

?>
</body>
</html>