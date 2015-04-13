<!-- Die dbcon.php baut die Verbindung zur Datenbank auf.

@version final
@copyright none

-->
<?php
# Variablen für die Datenbankanbindung
$host = "localhost";
$port = 3306;
$socket = "";
$user = "root";
$password = "";
$dbname = "blog";
# Die eigentlichen Verbindung zur Datenbank
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die('Could not connect to database server' . mysqli_connect_error());

# Legt den Standard-Zeichensatz fest: UTF-8. Benötigt zwei Argumente: Verbindungskennung und Namen des Zeichensatzes.
mysqli_set_charset($con,'utf8');
?>
