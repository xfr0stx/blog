<!DOCTYPE html>
<!-- Der Benutzer wird regsitriert, also in die DB eingetragen und 
erhält eine Bestätigung der registrierung.
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
        $convertdate = implode("-", array_reverse(explode('.', $escaped_geburtsdatum)));

        $escaped_strasse = mysqli_real_escape_string($con, $_POST["strasse"]);
        $escaped_hausnummer = mysqli_real_escape_string($con, $_POST["hausnummer"]);
        $escaped_plz = mysqli_real_escape_string($con, $_POST["plz"]);
        $escaped_ort = mysqli_real_escape_string($con, $_POST["ort"]);

        if (isset($_FILES['upload'])) {
            $size = $_FILES['upload']['size'];
            $type = $_FILES['upload']['type'];
            $check = false;

            echo $size;
            echo $type;

            if ($type == 'image/jpeg' or $type == 'image/gif') {
                $check = true;
            }

            if ($size < 102400 && $check == true) {
                $img = uniqid() . "-" . $_FILES['upload']['name'];
                move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/blog/img/" . $img);

                $checkstmt = $con->query("SELECT email FROM user WHERE email=\"$escaped_email\"");

                if ($checkstmt->num_rows >= 1) {
                    ?>
                    <b>Schon vorhanden!</b><br>
                    <?php
                } else {
                    $sql1 = "INSERT INTO adresse(strasse,hausnummer,plz,ort) VALUES ('$escaped_strasse',$escaped_hausnummer ,$escaped_plz,'$escaped_ort')";
                    $abfrage1 = mysqli_query($con, $sql1);
                    $last_id = mysqli_insert_id($con);

                    $sql = "INSERT INTO user(email,passwort,geburtsdatum,avatar, adresse_idadresse) VALUES ('$escaped_email','$hashedpw' ,'$convertdate','img/$img','$last_id')";
                    $abfrage = mysqli_query($con, $sql);
                    ?>

                    Regestrierung erfolgreich!<br>
                    <?php
                }
            } elseif ($size > 102400) {
                echo 'Die Datei ist zu groß! <br>';
            } elseif ($check == false) {
                echo 'Die Datei ist kein *.jpg / *.gif Bild oder ist unbekannt! <br>';
            }
        }
        ?>
        Zurück zur
        <a href="../index.php">Anmeldung!</a>
    </body>
</html>