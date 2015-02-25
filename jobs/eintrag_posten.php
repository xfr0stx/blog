<!DOCTYPE html>
<!-- Die eintrag_posten.php ist dazu da, die eingetragene Werte aus dem Formular von blog.php
in die Datenbank via INSERT-Befehl zu schreiben

@version final
@copyright none

-->

<?php

include_once "../db/dbcon.php";
session_start();
//Hier werden alle eingaben "escaped" das beudetet, dass Einträge abgesichert werden, bevor sie an die Datenbank übermittelt werden.
// Ohne das escapen von Einträgen wäre eine Verfälschung der Einträge möglich. Deshalb sollten fast alle Eingaben (z.B. ausnahme PW) 
// bevor Sie an die Datenbank übergeben werden "escaped" werden.
$escaped_titel = mysqli_real_escape_string($con, $_POST["titel"]);
$escaped_eintrag = mysqli_real_escape_string($con, $_POST["eintrag"]);
$usersession = $_SESSION['usersession'];

 $stmt = $con->prepare("INSERT INTO eintrag(titel,eintrag,eintragdatum,user_idUser) VALUES (?,?,NOW(),?)")
                            or die("<b>Prepare Error: </b>" . $con->error);

                    $stmt->bind_param("ssi", $escaped_titel,$escaped_eintrag,$usersession);
                    $stmt->execute();
$stmt->close();
#$abfrage = mysqli_query($con, $sql);
//Weiterleitung an blog.php
header("Location: ../blog.php");
?>