<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
        <form action="login.php" method="POST">
           E-Mail <input type="text" size="20" value="" name="email"><br><br>
           Passwort <input type="Password" size="20" value="" name="passwort"><br>
            <input type="submit" value="Senden">
        </form>
        <a href="register.php">Registrieren</a>
        <?php
        
        ?>
    </body>
</html>
