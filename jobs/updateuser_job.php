<!DOCTYPE html>
<!--  Die updateuser_job.php wird genutzt um Userprofile zu aktualisieren.

@author Mauro&Willger
@version final
@copyright none

-->
<?php
session_start();
if ($_SESSION["loginOK"] != true) {
    header("Location: ../index.php");
} else {
    include_once "../db/dbcon.php";
    $escaped_email = mysqli_real_escape_string($con, $_POST["email"]);
    $new_userpass = $_POST["new_passwort"];
    $new_userpass2 = $_POST["new_passwort2"];
    $userpass = $_POST["passwort"];
    $hashedpw = hash('sha512', $userpass);
    $escaped_geburtsdatum = mysqli_real_escape_string($con, $_POST["geburtsdatum"]);

    $escaped_strasse = mysqli_real_escape_string($con, $_POST["strasse"]);
    $escaped_hausnummer = mysqli_real_escape_string($con, $_POST["hausnummer"]);
    $escaped_plz = mysqli_real_escape_string($con, $_POST["plz"]);
    $escaped_ort = mysqli_real_escape_string($con, $_POST["ort"]);
    $idUser = $_SESSION['usersession'];

    # aktuelles login passwort ok? wird benötigt um das profile zu updaten
    $stmt = $con->prepare("SELECT email FROM blog.user WHERE idUser = ? AND passwort = ?;")
            or die("<b>Prepare Error: </b>" . $this->con->error);
    $stmt->bind_param("ss", $idUser, $hashedpw);
    $stmt->execute();
    $error = true;
    if (!$stmt->fetch()) {
        $stmt->close();
        header('Location: ../userprofile.php?error');
        return;
        $error = false;
    } else {
        $stmt->close();
        # neues passwort? Falls ja neues Passwort setzen. Dabei muss das alte PW zwei mal eingegeben werden
        # Beide PWs werden vergliechen
        if ($new_userpass != "") {
            if ($new_userpass == $new_userpass2) {
                $newpw = hash('sha512', $new_userpass);
                $error = false;
            } else {
                header('Location: ../userprofile.php?error2');
                return;
            }
        } else {
            # Falls kein neues PW eingegeben wird ist das neuepw das alte
            $newpw = $hashedpw;
            $error = ($error or false);
        }
        # Adresse updaten
        $stmt = $con->prepare("SELECT idadresse FROM adresse WHERE strasse=? AND hausnummer=? AND plz=? AND ort=?;");
        $stmt->bind_param("sdds", $escaped_strasse, $escaped_hausnummer, $escaped_plz, $escaped_ort);
        $stmt->execute();
        $stmt->bind_result($idadresse);

        # Falls neue Adresse noch nicht vorhanden --> erstellen
        if (!$stmt->fetch()) {
            $stmt->close();
            $stmt = $con->prepare("INSERT INTO adresse (strasse, hausnummer, plz, ort) VALUES (?,?,?,?);");
            $stmt->bind_param("sdds", $escaped_strasse, $escaped_hausnummer, $escaped_plz, $escaped_ort);
            $stmt->execute();
            $idadresse = $stmt->insert_id;
        }
        $stmt->close();
        # Falls ein neues Avatar gesetzt wird setzen -> vorgehen wie in register_job
        if (isset($_FILES['avatarnew'])) {
            $size = $_FILES['avatarnew']['size'];
            $type = $_FILES['avatarnew']['type'];
            if ($size < 102400) {
                if ($type == 'image/jpeg') {
                    $check = true;
                    $fileend = '.jpg';
                } elseif ($type == 'image/gif') {
                    $check = true;
                    $fileend = '.gif';
                }
                $img = $idUser . $fileend;

                move_uploaded_file($_FILES['avatarnew']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/blog/img/" . $img);
                $img = $idUser . $fileend;
                move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/blog/img/" . $img);

                # Updaten des Avatars
                $stmt = $con->prepare("UPDATE blog.user SET avatar=CONCAT('img/',?) WHERE idUser=?;")
                        or die("<b>Prepare Error: </b>" . $con->errno . ":" . $con->error);
                $stmt->bind_param("sd", $img, $idUser);
                $stmt->execute();
                $stmt->close();
            } else {
                header('Location: ../userprofile.php');
            }
        }
        # Benutzer updaten
        $_SESSION['userad'] = $idadresse;
        print($escaped_geburtsdatum);
        $stmt = $con->prepare("UPDATE blog.user SET geburtsdatum=str_to_date(?, '%d.%m.%Y'), email=?, passwort=?, adresse_idadresse=? WHERE idUser=?;");
        $stmt->bind_param("ssssd", $escaped_geburtsdatum, $escaped_email, $newpw, $idadresse, $idUser);
        print($idUser);
        $stmt->execute()
                or die("UPDATE Fehler: " . $stmt->error);
        $stmt->close();
        header("Location: ../userprofile.php");
    }
}
?>
</html>