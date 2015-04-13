<!DOCTYPE html>
<!-- Die kommentare.php ist für die Kommentare zu den einzelnen Blogeinträgen zuständig. Anhand der
id des FK werden die Kommentare zum Blog aufgelistet.

@version final
@copyright none

-->
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
            <h1>Poste dein Kommentar!</h1>

            <form action="./jobs/kommentar_posten.php" method="POST">

                <br> <textarea name="kommentar" cols="50" rows="10" value="" style="width: 621px; height: 186px;;"></textarea> <br>
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                <input type="submit" value="Posten!">
            </form> 
            <a href="./jobs/logout.php">Logout!</a><br>
            <a href="blog.php">Zurück zum Blog!</a>
            <?php
            include_once "db/dbcon.php";
            # Prepared statement zur Abfrage der Kommentare in Bezug auf die Blogeinträge
            $stmt = $con->prepare("SELECT eintrag.titel, kommentar.kommentar,kommentar.datum, user.email FROM kommentar JOIN eintrag ON kommentar.eintrag_ideintrag = eintrag.ideintrag JOIN user ON kommentar.user_iduser = user.idUser WHERE ideintrag = ? ORDER BY kommentar.idanswere  DESC;")
                    or die("<b>Prepare Error: </b>" . $this->con->error);
            $stmt->bind_param("s", $_GET["id"]);
            $stmt->execute();

            $stmt->bind_result($titel, $kommentar, $datum, $email);
            echo '<br>';
            echo '<br>';
            while ($stmt->fetch()) {
                # Ausgabe vom Kommentar, datum und email.
                echo '<div style="text-align: justify">';
                echo '<p align="center">Posted am: ' . $datum_deutsch = date('d.m.Y H:i:s', strtotime($datum)) . '.</p>';
                echo '<p align="center">von: ' . $email . '</p>';
                echo '<table style="word-break:break-all;word-wrap:break-word" border="0" align="center" width="300">';
                echo '<tr><td bgcolor ="#E2E2E2" width ="300" valign="top"><FONT COLOR="#5B496E">' . $kommentar . '</td></tr>';
                echo '</table>';
                echo '</div>';
                echo '<hr noshade width="300" size="3" align="center">';
            }
            $stmt->close();
            ?>

        </body>
    </html>
    <?php
}
?>