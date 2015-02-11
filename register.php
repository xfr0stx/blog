<!DOCTYPE html>
<!--  Der User kann sich hier im Blog registrieren. Es werden alle Felder benötigt
das Geburtsdatum wird auf vollständigkeit gerpüft.
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
        <form action="./jobs/register_job.php" method="POST">
            <td align="left">
          Email <input type="text" size="20" value="" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br><br>
          Passwort <input type="password" size="20" value="" name="passwort" required>
          Geburtsdatum (dd.mm.yyyy) <input type="date" size="20" value="" name="geburtsdatum" required pattern="^(31|30|0[1-9]|[12][0-9]|[1-9])\.(0[1-9]|1[012]|[1-9])\.((18|19|20)\d{2}|\d{2})$"><br><br> 
          Strasse Nr. <input type="text" size="20" value="" name="strasse" required>
           <input type="text" size="5" value="" name="hausnummer" required><br>
          PLZ Ort <input type="text" size="5" value="" name="plz" required>
           <input type="text" size="5" value="" name="ort" required><br>
            <input type="submit" value="Senden">
            </td>
        </form>
        </table>
        <?php
        
        ?>
    </body>
</html>