<!DOCTYPE html>
<!--  Die register_job.php wird genutzt um User zu registrieren und in die DB einzutragen.

@author Mauro&Willger
@version final
@copyright none

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bl0gster</title>
        <link rel="stylesheet" type="text/css" href="../design.css">
    </head>
    <body>
        <?php
        include_once "../db/dbcon.php";

        $escaped_email = mysqli_real_escape_string($con, $_POST["email"]);
        $userpass = $_POST["passwort"];
        $hashedpw = hash('sha512', $userpass);
        $escaped_geburtsdatum = mysqli_real_escape_string($con, $_POST["geburtsdatum"]);
        #Wandelt das Datum in "mysql" Komformität um.
        $convertdate = implode("-", array_reverse(explode('.', $escaped_geburtsdatum)));

        $escaped_strasse = mysqli_real_escape_string($con, $_POST["strasse"]);
        $escaped_hausnummer = mysqli_real_escape_string($con, $_POST["hausnummer"]);
        $escaped_plz = mysqli_real_escape_string($con, $_POST["plz"]);
        $escaped_ort = mysqli_real_escape_string($con, $_POST["ort"]);


        // Avatar
        $avatar = false;
        $error = false;
        # Überprüfen ob ein Avatar it hochgeladen wird und speichern des größe und typ.
        if (isset($_FILES['upload']) && $_FILES['upload']["size"] > 0) {
            $size = $_FILES['upload']['size'];
            $type = $_FILES['upload']['type'];

            $checked = false;
            
            # Überprüfen des Filetyps
            if ($type == 'image/jpeg') {

                $fileend = '.jpg';
                $check = true;
            } elseif ($type == 'image/gif') {
                $check = true;
                $fileend = '.gif';
            }


            # Überprüfen der Filegröße (kleiner 100kb) und richtigen Filetyp
            if ($size < 102400 && $check == true) {
                $avatar = true;
            } else {
                print("<b>Dateigröße zu groß! <=100kb!</b>");
                $error = true;
            }
        }

        // Benutzer schon vorhanden?
        $stmt = $con->prepare("SELECT email FROM user WHERE email=?");
        $stmt->bind_param("s", $escaped_email);
        $stmt->execute();
        $stmt->store_result();
        $user_exists = ($stmt->num_rows() == 1);
        $stmt->free_result();
        $stmt->close();
        
        # Falls der user existiert ($user_exists = ($stmt->num_rows() == 1)) ausgabe der Meldung und die
        # Error Variable auf true setzen.
        if ($user_exists) {
            print("<b>Schon vorhanden!</b>");
            $error = true;
        }
        
        # Falls Error variable nicht true ist führe aus:
        if (!$error) {

            # Adresse updaten
            $stmt = $con->prepare("SELECT idadresse FROM adresse WHERE strasse=? AND hausnummer=? AND plz=? AND ort=?;");
            $stmt->bind_param("sdds", $escaped_strasse, $escaped_hausnummer, $escaped_plz, $escaped_ort);
            $stmt->execute();
            $stmt->bind_result($idadresse);
            #  Falls neue Adresse noch nicht vorhanden --> erstellen
            if (!$stmt->fetch()) {
                $stmt->close();
                $stmt = $con->prepare("INSERT INTO adresse (strasse, hausnummer, plz, ort) VALUES (?,?,?,?);");
                $stmt->bind_param("sdds", $escaped_strasse, $escaped_hausnummer, $escaped_plz, $escaped_ort);
                $stmt->execute();
                $idadresse = $stmt->insert_id;
            }
            $stmt->close();

            
            # Benutzer hinzufügen
            $stmt = $con->prepare("INSERT INTO user(email,passwort,geburtsdatum,adresse_idadresse) VALUES (?,?,STR_TO_DATE(?,'%Y-%m-%d'),?)")
                    or die("<b>Prepare Error: </b>" . $con->error);
            $stmt->bind_param("sssi", $escaped_email, $hashedpw, $convertdate, $idadresse);
            $stmt->execute();
            $idUser = $con->insert_id;
            $stmt->close();
            

            #  Avatar hochladen und updaten
            if ($avatar) {
                # Das Avatar bekommt den namen "iduser"."filetyp"
                $img = $idUser . $fileend;
                # Hochladen der Datei in /blog/img
                move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/blog/img/" . $img);


                $stmt = $con->prepare("UPDATE blog.user SET avatar=CONCAT('img/',?) WHERE idUser=?;")
                        or die("<b>Prepare Error: </b>" . $con->errno . ":" . $con->error);
                $stmt->bind_param("sd", $img, $idUser);
                $stmt->execute();
                $stmt->close();
            }
            print("Regestrierung erfolgreich!<br>");
        }
        ?>
        <h1>DelaCom's | IT-Blog</h1><br>
        Zurück zur
        <a href="../index.php">Anmeldung!</a>

    </body>
</html>