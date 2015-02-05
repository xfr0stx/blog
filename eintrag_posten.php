<?php
include_once "db/dbcon.php";

$escaped_titel = mysqli_real_escape_string($con,$_POST["titel"]);
$escaped_eintrag= mysqli_real_escape_string($con,$_POST["eintrag"]);


#$userpass = $hashedpw = hash('sha512',$escaped_passwort);

$sql = "INSERT INTO eintrag(titel,eintrag,eintragdatum) VALUES ('$escaped_titel','$escaped_eintrag',NOW())";
$abfrage =mysqli_query($con,$sql);
header("Location: blog.php");
?>