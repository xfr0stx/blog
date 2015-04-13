<!DOCTYPE html>
<!-- Die kommentar_posten.php ist dazu da, die eingetragene Werte aus dem Formular von kommentar.php
in die Datenbank via INSERT-Befehl zu schreiben

@version final
@copyright none

-->
<?php
include_once "../db/dbcon.php";
session_start();
$id = $_POST["id"];
$kommentar = mysqli_real_escape_string($con, $_POST["kommentar"]);
$usersession = $_SESSION['usersession'];
# Eintrag des Kommentars in die Datenbank. Dabei wird die ID vom Post und die Userid der Sessionvariable genutzt.
$sql = "INSERT INTO kommentar(kommentar,datum,eintrag_ideintrag,user_idUser) VALUES ('$kommentar',NOW(),$id,$usersession)";
$abfrage = mysqli_query($con, $sql);


# Die id wird in den Header geschrieben und somit in der "Variable" zu speichern
header("Location: ../kommentare.php?id=$id");
?>