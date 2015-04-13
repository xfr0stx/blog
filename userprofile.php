<!DOCTYPE html>
<!-- Die userprofile.php ist dazu da, um das Userprofile des Benutzers zu aktualisieren.
Der Benutzer bekommt seine aktuellen Daten im Formular angezeigt und muss sein Kennwort
zur Bestätigung des Updates angeben.

@version final
@copyright none

-->
<!--Session wird gestartet-->
<?php
session_start();
if ($_SESSION["loginOK"] != true) {
    header("Location: index.php");
} else {
    ?>

    <html>
        <head>
            <meta charset="UTF-8">
            <title>Bl0gster</title>
            <link rel="stylesheet" type="text/css" href="design.css">
        </head>
        <body>
            <h1>Profile bearbeiten, dude!</h1>
            <!-- Abfrage mithilfe von GET -> schaut in die GET Variable (auch zu sehen in der 
                 Adressezeile (?error/2)). Anschließend wird der der entsprechende Fehlercode
                 zurückgegeben.-->
            <?php
                      
            if (array_key_exists('error', $_GET)) {
                print("Falsches Passwort eingegeben !");
            } elseif (array_key_exists('error2', $_GET)) {
                print("Die beiden neuen Passwörter passen nicht!");
            }
                      
            ?>
            <?php
            include_once "./db/dbcon.php";

            
            # Statement zum ermitteln der Benutzerdaten des angemeldeten Users. Besonderheit: Formatierung des Geburtsdatum nach d.m.y
            $stmt = $con->prepare("SELECT u.iduser,u.email,date_format(u.geburtsdatum, '%d.%m.%Y'), ad.strasse, ad.hausnummer, ad.plz, ad.ort FROM adresse ad INNER JOIN user u ON adresse_idadresse=idadresse WHERE iduser =?")
                    or die("<b>Prepare Error: </b>" . $this->con->error);
            $stmt->bind_param("i", $_SESSION["usersession"]);
            $stmt->execute();
            $stmt->bind_result($idUser, $email, $geburtsdatum, $strasse, $hausnummer, $plz, $ort);
            if ($stmt->fetch()) {
                
            # Ausgabe der Variablen im Formular    
                print("
                        <form action='./jobs/updateuser_job.php' method='POST' enctype='multipart/form-data'>
        
               Email<br>
               <input type='email' size='20' value='$email' name='email'><br>
               Geburtsdatum (dd.mm.yyyy) <br><input type='date' size='20' value='$geburtsdatum' name='geburtsdatum'  pattern='^(31|30|0[1-9]|[12][0-9]|[1-9])\.(0[1-9]|1[012]|[1-9])\.((18|19|20)\d{2}|\d{2})$'><br>
                Strasse Nr. <br><input type='text' size='20' value='$strasse' name='strasse' required>
                <input type='text' size='5' value='$hausnummer' name='hausnummer' required><br>
                PLZ Ort <br><input type='text' size='5' value='$plz' name='plz' required>
                <input type='text' size='5' value='$ort' name='ort' required><br>
                Avatar <br><input type='file' name='avatarnew'><br>
                neues Passwort* <br><input type='Password' size='20' value='' name='new_passwort' ><br>
                neues Passwort* <br><input type='Password' size='20' value='' name='new_passwort2' ><br>
                Password** <br><input type='Password' size='20' value='' name='passwort' ><br><br>
                <input type='submit' value='Update!'>
                <br>
                * = optional<br>
                ** = erforderlich<br>
                <a href='./blog.php'>Zurück zum Blog!</a><br>
                <a href='./jobs/logout.php'>Logout!</a><br>
                </form>
                ");
                $stmt->close();
            }
            ?>
        </body>
    </html>
    <?php
}
?>