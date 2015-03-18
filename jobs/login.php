   <!--  login.php ist die Hilfedatei zum einloggen.
Es wird eine Verbindung zur Datenbank aufgebaut und ein entsprechender User
in der Datenbank gesucht. Falls der User in der Datenbank existiert wird er an den
Blog weitergeleitet, ansonsten bleibt er auf der index.php. Der Gast-Benutzer kann
sich ebenfalls einloggen und wird dann auf die gast.php weitergeleitet.

@version final
@copyright none
 
-->
<?php
include_once ("../db/dbcon.php");

$escaped_email = mysqli_real_escape_string($con, $_POST["email"]);
$userpass = $_POST["passwort"];
$hashedpw = hash('sha512', $userpass);

# Überprüfen ob der User in der DB existiert. Dabei wird selbstverständlich prepaired statements verwendet
# so können SQL Injections vermiden werden.
$stmt = $con->prepare("SELECT idUser, email,adresse_idadresse FROM blog.user WHERE email = ? AND passwort = ?;")
        or die("<b>Prepare Error: </b>" . $this->con->error);
$stmt->bind_param("ss", $escaped_email, $hashedpw);
$stmt->execute();
$stmt->bind_result($uid, $email, $idadresse);

# Überprüfen ob man sich mit gast einloggt. Session wird mit gastF gestartet.
if (($_POST["email"] == "gast") && ($userpass = $_POST["passwort"] == "gast")) {
    session_start();
    $_SESSION["loginOK"] = true;
    header("Location: ../blog.php");
    $_SESSION['email'] = "gast";
} else {

# Einloggen mit dem Benutzer und starten einer Session. Dabei werden verschiedene Werte in die Session Variable gespeichert
# So können diese während der kompletten Session verwendet werden.
    if ($stmt->fetch()) {
        session_start();
        $_SESSION["loginOK"] = true;
        $_SESSION['email'] = $email;
        $_SESSION['usersession'] = $uid;
        $_SESSION['userad'] = $idadresse;
        $stmt->close();
        header("Location: ../blog.php");
    } else {
        $stmt->close();
# Falls die Logindaten nicht stimmen, übergabe einer "errorvariable" im header.
        header("Location: ../index.php?error");
    }
}
?>