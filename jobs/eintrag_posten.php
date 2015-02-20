<?php

include_once "../db/dbcon.php";
session_start();
$escaped_titel = mysqli_real_escape_string($con, $_POST["titel"]);
$escaped_eintrag = mysqli_real_escape_string($con, $_POST["eintrag"]);
$usersession = $_SESSION['usersession'];

#$userpass = $hashedpw = hash('sha512',$escaped_passwort);

#$sql = "INSERT INTO eintrag(titel,eintrag,eintragdatum,user_idUser) VALUES ('$escaped_titel','$escaped_eintrag',NOW(),$usersession)";
 $stmt = $con->prepare("INSERT INTO eintrag(titel,eintrag,eintragdatum,user_idUser) VALUES (?,?,NOW(),?)")
                            or die("<b>Prepare Error: </b>" . $con->error);

                    $stmt->bind_param("ssi", $escaped_titel,$escaped_eintrag,$usersession);
                    $stmt->execute();
$stmt->close;
$abfrage = mysqli_query($con, $sql);
#var_dump($sql); 
#var_dump(mysqli_error($con));
header("Location: ../blog.php");
?>