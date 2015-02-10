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

        $sql_existiert = "SELECT email FROM user WHERE email=\"$escaped_email\"";
        $abfrage_existiert = mysqli_query($con, $sql_existiert);

        if ($abfrage_existiert->num_rows >= 1) {
            ?>
            Schon vorhanden!<br>
            <?php
        } else {
            $sql = "INSERT INTO user(email,passwort,geburtsdatum) VALUES ('$escaped_email','$hashedpw' ,'$convertdate')";
            $abfrage = mysqli_query($con, $sql);
            ?>

            Regestrierung erfolgreich!<br>
    <?php
}
?>
        Zurück zur Anmeldung!
        <a href="../index.php">Anmeldung!</a>
    </body>
</html>