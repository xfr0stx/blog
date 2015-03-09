<!DOCTYPE html>
<!-- Die register.php dien zur Registrierung des Benutzers im Blog. Es werden alle Felder, mit Ausnahme
des Avatars, benötigt. 

@version final
@copyright none

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bl0gster</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>
        <h1>Regstriere dich!</h1><br>
        Bitte vervollständige die folgenden Einträge:

        <table border="1" style="width:30%" align="center">
            <form action="./jobs/register_job.php" method="POST" enctype="multipart/form-data">
                <!--Es erfolgt die Eingabe und das Senden/Uploaden der Userdaten mit folgenden erforderlichen Kriterien:
                Email = als email format [..]@[..].[]
                Password = mindestens 6 Zeichen!
                Datum im Format = dd.mm.YYYY
                PLZ = genau 5 Zahlen zwischen 0-9
                Ort = mindestens 3 Zeichen von A-Z und a-z
                
                Das Ganze erfolgt in einer Tabelle <table> im Zentrum "center" des Bildschirms.
                -->
                <td align="center">
                    <label for="email">Email</label><br />
                    <input type="email" size="20" value="" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br>
                    <label for="password">Passwort (min. 5 Zeichen)</label><br />
                    <input type="password" size="20" value="" name="passwort" pattern=".{5,}" required><br>
                    <label for="geburtsdatum">Geburtsdatum (dd.mm.yyyy)</label><br />
                    <input type="date" size="20" value="" name="geburtsdatum" required pattern="^(31|30|0?[1-9]|[12][0-9])\.(0?[1-9]|1[012])\.((18|19|20)?\d{2})$"><br> 
                    <label for="strasse">Strasse Nr. </label><br />
                    <input type="text" size="20" value="" name="strasse" required>
                    <input type="text" size="5" value="" name="hausnummer" required><br>
                    <label for="plz" >PLZ Ort</label><br />
                    <input type="text" size="5" value="" name="plz" pattern="[0-9]{5}"  required>
                    <input type="text" size="5" value="" name="ort" pattern="[A-Za-z]{3,}"  required><br><br />
                    <label for="upload">Avatar* </label><br />
                    <input type="file" name="upload"><br><br />
                    <input type="submit" value="Senden" name="submit">
                </td>
            </form>
            <br />
            * = optional
        </table>
        Zurück zum <a href="index.php">Login!</a>
        <?php
        ?>
    </body>
</html>