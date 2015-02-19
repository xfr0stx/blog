<!--  login.php ist die Hilfedatei zum einloggen.
Es wird eine Verbindung zur Datenbank aufgebaut und ein entsprechender User
in der Datenbank gesucht. Falls der User in der Datenbank existiert wird er an den
Blog weitergeleitet, ansonsten bleibt er auf der index.php. Der Gast-Benutzer kann
sich ebenfalls einloggen und wird dann auf die gast.php weitergeleitet.
-->
<?php
include_once ("../db/dbcon.php");

$escaped_email = mysqli_real_escape_string($con, $_POST["email"]);
$userpass = mysqli_real_escape_string($con, $_POST["passwort"]);
$hashedpw = hash('sha512', $userpass);

$sql = "SELECT email,passwort,idUser,adresse_idadresse FROM blog.user WHERE email=\"$escaped_email\" AND passwort=\"$hashedpw\"";
$abfrage = mysqli_query($con, $sql);
//
//$stmt = $con->prepare("SELECT email,passwort,idUser, adresse_idadresse FROM blog.user WHERE email= ? AND passwort= ?")
//		or die("<b>Prepare Error: </b>" . $con->error);
//$stmt->bind_param('ss',$escaped_email,$hashedpw);
//$stmt->execute();
//$stmt->store_result();

//echo mysqli_error($con);

if (($_POST["email"] == "gast") && ($userpass = $_POST["passwort"] == "gast")) {
    session_start();
    $_SESSION["loginOK"] = true;
    header("Location: ../gast.php");
} else {

    if ($abfrage->num_rows >= 1) {
        session_start();
        $_SESSION["loginOK"] = true;
        $fetch = mysqli_fetch_assoc($abfrage);
      # $fetch = mysqli_stmt_fetch($stmt);
        $_SESSION['usersession'] = $fetch['idUser'];
        $_SESSION["userad"] = $fetch['adresse_idadresse'];
        header("Location: ../blog.php");
    } else {

        header("Location: ../index.php");
    }
}
#$stmt->close();
?>