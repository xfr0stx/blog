<!DOCTYPE html>
<?php
session_start();
if ($_SESSION["loginOK"] != true) {
    header("Location: ../index.php");
} else {

    include_once "../db/dbcon.php";
    $escaped_email = mysqli_real_escape_string($con, $_POST["email"]);
    $userpass =$_POST["passwort"];
    $hashedpw = hash('sha512', $userpass);
    $escaped_geburtsdatum = mysqli_real_escape_string($con, $_POST["geburtsdatum"]);
    $convertdate = implode("-", array_reverse(explode('.', $escaped_geburtsdatum)));

    $escaped_strasse = mysqli_real_escape_string($con, $_POST["strasse"]);
    $escaped_hausnummer = mysqli_real_escape_string($con, $_POST["hausnummer"]);
    $escaped_plz = mysqli_real_escape_string($con, $_POST["plz"]);
    $escaped_ort = mysqli_real_escape_string($con, $_POST["ort"]);

    $iduser = $_SESSION['usersession'];
    $sql = "UPDATE blog.user SET geburtsdatum=\"$convertdate\" email=\"$escaped_email\" passwort=\"$hashedpw\" WHERE iduser=$iduser";
    $abfrage = mysqli_query($con, $sql);
    $last_id = mysqli_insert_id($con);
    $sql1 = "UPDATE blog.adresse SET strasse=\"$escaped_strasse\" hausnummer=\"$escaped_hausnummer\" plz=\"$escaped_plz\" ort=\"$escaped_ort \" WHERE idadresse=$last_id";
    $abfrage1 = mysqli_query($con, $sql);

    header("Location: ../userprofile.php");
}
?>
</html>