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

$stmt = $con->query("SELECT email,passwort,idUser,adresse_idadresse FROM blog.user WHERE email=\"$escaped_email\" AND passwort=\"$hashedpw\"");
//$sql = "SELECT email,passwort,idUser,adresse_idadresse FROM blog.user WHERE email=\"$email\" AND passwort=\"$hashedpw\"";
//$abfrage = mysqli_query($con, $sql);

if (($_POST["email"] == "gast") && ($userpass = $_POST["passwort"] == "gast")) {
    session_start();
    $_SESSION["loginOK"] = true;
    header("Location: ../gast.php");
} else {

    if ($stmt->num_rows >= 1) {
        session_start();
        $_SESSION["loginOK"] = true;
        $fetch = mysqli_fetch_assoc($stmt);
        $_SESSION['usersession'] = $fetch['idUser'];
        $_SESSION["userad"] = $fetch['adresse_idadresse'];
        header("Location: ../blog.php");
    } else {

        header("Location: ../index.php");
    }
}
?>