<!DOCTYPE html>
<!--  Die index.php wird vom Apache-Server standardmäßig als Startseite aufgerufen.
@author Mauro&Willger
@version final
@copyright none

-->
<html>
    <!--  Das Greündgerüst einer HTML-Datei ist immer wie folgt aufgebaut:
    <!DOCTYPE html>
    Im Bereich DOCTYPE wird dem Internet-Browser mitgeteilt, 
    was er an Befehlen erwarten kann und an welchem Standard man sich bei der Erstellung der Seite gehalten hat.
    <html>
    Im Bereich HTML wird der eigentliche HTML-Code geschrieben
    <head>
    Im Bereich HEAD stecken die Metainformationen über die Seite, 
    also beispielsweise der Titel der Seite, der im Browserfensterkopf angezeigt wird.
    </head>
    <body>
    Im Bereich BODY stecken der eigentliche Inhalt der Seite und die HTML-TAGs.
    </body>
    </html>
    
    Die sog. Tags müssen in der Regel geöffnet <..> und geschlossen </..> werden.
    
    -->
    <head>
        <!-- Setzen der Sprache auf UTF-8 -->
        <meta charset="UTF-8">
        <!-- Bezeichnung des Titels welches im Browser angezeigt wird -->
        <title>Bl0gster</title>
        <!-- Einbinden der CSS-Datei für das Design der Webseite -->
        <link href="design.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!-- <h"x"> Gibt eine Überschrift an, das Layout wird der CSS-Datei entnommen. -->
        <h1>|)eltaCom's | IT-Blog</h1><br>
        Bitte melden Sie sich an um einen Eintrag zu posten:
        <!-- <p> leitet einen Textabsatz ein. -->
        <p>Gäste haben nur Lesezugang (User:gast - PW:gast)!</p>
        <!--form <form> erstellt ein Formular welches die E-Mail-Adresse und das Passwort des Benutzers abfragt
        dazu werden die eigentlichen "Input-Types" ausgewählt, die Größe des Feldes definiert und mit required 
        die Eingabe auf "Erforderlich" gesetzt. Nach dem Drücken des Buttons "submit" werden die Informationen
        über die methode "POST" (verschicken) direkt an den Webserver gesendet und kann dort weiterverarbeitet werden-->
        <div id="login">
            <form action="./jobs/login.php" method="POST">
                E-Mail: <input type="text" size="20" value="" placeholder ="Em@il" name="email" required><br><br>
                Passwort: <input type="Password" size="20" value="" placeholder ="Passwort" name="passwort" required ><br>
                <input type="submit" csvalue="Senden">
            </form> </div><br><br>
        <a id="abutton" href="register.php">Registrieren</a><br>


        <?php
        # Prüft den Wert in der URL ([..]?error) über $_GET (empfangen) und printed ggf. eine Meldung

        if (array_key_exists("error", $_GET)) {
            echo"<br>";
            echo "<b>Falsche email oder pw</b>";
        }
        ?>
    </body>
</html>