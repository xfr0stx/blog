<!DOCTYPE html>
<?php
include_once "db/dbcon.php";

<<<<<<< HEAD:updateuser_job.php
$escaped_email = mysqli_real_escape_string($con,$_POST["email"]);
#$escaped_passwort = mysqli_real_escape_string($con,$_POST["passwort"]);
$userpass = $_POST["passwort"];
$escaped_geburtsdatum= mysqli_real_escape_string($con,$_POST["geburtsdatum"]);
$convertdate=implode("-", array_reverse(explode('.', $escaped_geburtsdatum)));
$hashedpw = hash('sha512',$userpass);

$sql = "UPDATE blog.user SET geburtsdatum=$escaped_geburtsdatum email=$escaped_email passwort=$userpass WHERE iduser=21";
$abfrage =mysqli_query($con,$sql);

=======
$escaped_email = mysqli_real_escape_string($con, $_POST["email"]);
#$escaped_passwort = mysqli_real_escape_string($con,$_POST["passwort"]);
$userpass = $_POST["passwort"];
$escaped_geburtsdatum = mysqli_real_escape_string($con, $_POST["geburtsdatum"]);
$convertdate = implode("-", array_reverse(explode('.', $escaped_geburtsdatum)));
$hashedpw = hash('sha512', $userpass);

$sql = "UPDATE blog.user SET geburtsdatum=$escaped_geburtsdatum email=$escaped_email passwort=$userpass WHERE iduser=21";
$abfrage = mysqli_query($con, $sql);
>>>>>>> origin/master:jobs/updateuser_job.php
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bl0gster</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>
        Update Erfolgreich<br>
        Zurück zum Profile!
        <a href="userprofile.php">YourProfile!</a>
    </body>
</html>