<?php
include_once "db/dbcon.php";

$escaped_email = mysqli_real_escape_string($con,$_POST["email"]);
#$escaped_passwort = mysqli_real_escape_string($con,$_POST["passwort"]);
$userpass = $_POST["passwort"];
$escaped_geburtsdatum= mysqli_real_escape_string($con,$_POST["geburtsdatum"]);
$convertdate=implode("-", array_reverse(explode('.', $escaped_geburtsdatum)));
$hashedpw = hash('sha512',$userpass);

$sql = "INSERT INTO user(email,passwort,geburtsdatum) VALUES ('$escaped_email','$userpass' ,'$convertdate')";
$abfrage =mysqli_query($con,$sql);

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bl0gster</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>
        Regestrierung erfolgreich!<br>
        Zurück zur Anmeldung!
        <a href="index.php">Anmeldung!</a>
    </body>
</html>