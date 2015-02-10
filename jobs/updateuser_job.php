<!DOCTYPE html>
<?php
session_start();
if ($_SESSION["loginOK"] != true) {
    header("Location: ../index.php");
} else {
    
include_once "../db/dbcon.php";
$escaped_email = mysqli_real_escape_string($con, $_POST["email"]);

$userpass = $_POST["passwort"];
$hashedpw = hash('sha512', $userpass);

$escaped_geburtsdatum = mysqli_real_escape_string($con, $_POST["geburtsdatum"]);
$convertdate = implode("-", array_reverse(explode('.', $escaped_geburtsdatum)));

$iduser=$_SESSION['usersession'];
$sql = "UPDATE blog.user SET geburtsdatum=\"$convertdate\" email=\"$escaped_email\" passwort=\"$hashedpw\" WHERE iduser=$iduser";
$abfrage = mysqli_query($con, $sql);
var_dump($iduser);
header("Location: ../userprofile.php");


}
    ?>
</html>