<!DOCTYPE html>
<!-- Die eintrag_suchen.php ist dazu da, den eingetragen String aus dem Formular von blog.php
in der Datenbank zu suchen.

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
        <h1>Ergebnisse deiner Suche!</h1>
        Zurück zum
        <a href="../blog.php">Blog!</a>
        <?php
        include_once "../db/dbcon.php";
        $escaped_search = mysqli_real_escape_string($con, $_POST["search"]);
        # Die SQL Abfrage sucht den Eintrag und Joint dabei den User. Dabei werden zwei Platzhalter (%) gesetzt um so ein Suchen zu ermöglichen.
        $stmt = $con->prepare("SELECT eintrag.titel,eintrag.eintrag,eintrag.eintragdatum,user.email,user.avatar FROM eintrag JOIN user ON eintrag.user_idUser = user.idUser WHERE eintrag.titel LIKE  concat('%',?,'%')  ORDER BY eintrag.ideintrag  DESC")
                or die("<b>Prepare Error: </b>" . $con->error);

        $stmt->bind_param("s", $escaped_search);
        $stmt->execute();
        $stmt->bind_result($titel, $eintrag, $eintragsdatum, $email, $avatar);

        # Ausgabe der Suche inkl. titel, eintragsdatum, email und eintrag!   
        while ($stmt->fetch()) {

            echo '<div style="text-align: justify">';
            echo '<h2>' . $titel . '</h2>';
            echo '<p align="center">Posted am: ' . $eintragsdatum . '.</p>';
            echo '<p align="center">von: ' . $email . '</p>';
            echo '<table style="word-break:break-all;word-wrap:break-word" border="0" align="center" width="300">';
            echo '<tr><td bgcolor ="#E2E2E2" width ="300" valign="top"><FONT COLOR="#5B496E">' . $eintrag . '</td></tr>';
            echo '</table>';
            echo '</div>';
        }
        ?>


    </body>
</html>