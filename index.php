<!DOCTYPE html>
<!--  Diese Index.html wird als Startseite verwendet
Hier können sich Benutzer und Gäste einloggen und ggf. neu Registrieren
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bl0gster</title>
        <link href="design.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h1>DelaCom's | IT-Blog</h1><br>
        Bitte melden Sie sich an um einen Eintrag zu posten:
        <p>Gäste haben nur Lesezugang (User:gast - PW:gast)!</p>
        <form action="login.php" method="POST">
           E-Mail: <input type="text" size="20" value="" name="email" required><br><br>
           Passwort: <input type="Password" size="20" value="" name="passwort" required ><br>
            <input type="submit" value="Senden">
        </form>
        <a href="register.php">Registrieren</a>
        <?php
        
        ?>
    </body>
</html>
