<?php

include_once "../db/dbcon.php";
session_start();
$id = $_POST["id"];
$kommentar = mysqli_real_escape_string($con, $_POST["kommentar"]);
$usersession = $_SESSION['usersession'];

#$userpass = $hashedpw = hash('sha512',$escaped_passwort);

$sql = "INSERT INTO kommentar(kommentar,datum,eintrag_ideintrag,user_idUser) VALUES ('$kommentar',NOW(),$id,$usersession)";
$abfrage = mysqli_query($con, $sql);
var_dump($sql); 
#var_dump(mysqli_error($con));
header("Location: ../kommentare.php?id=$id");
?>