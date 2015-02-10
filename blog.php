<!DOCTYPE html>
<?php
session_start();
if ($_SESSION["loginOK"] != true) {
    header("Location: index.php");
} else {
    ?>
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
            <link rel="stylesheet" type="text/css" href="design.css">
        </head>
        <body>
            <h1>Your in! Welcome to the Bl0gster</h1>
            <form action="./jobs/eintrag_posten.php" method="POST">
                Title <input type="text" size="20" value="" name="titel"><br><br>
                Beitrag<br> <textarea name="eintrag" cols="50" rows="10" value="" style="width: 621px; height: 186px;;"></textarea> <br>
                <input type="submit" value="Posten!">
            </form>
            <a href="./jobs/logout.php">Logout!</a><br>
            <a href="userprofile.php">UserProfile bearbeiten!</a>
            <?php
            include_once "db/dbcon.php";
            $sql = "SELECT ideintrag, eintrag.titel,eintrag.eintrag,eintrag.eintragdatum,user.email FROM eintrag JOIN user ON eintrag.user_idUser = user.idUser ORDER BY eintrag.ideintrag  DESC";
            $abfrage = mysqli_query($con, $sql);
            ?>

            <?php
            echo '<br>';
            echo '<br>';
            while ($fetch = mysqli_fetch_assoc($abfrage)) {
                echo '<div style="text-align: justify;">';
                echo '<h2>' . $fetch['titel'] . '</h2>';
                echo '<p align="center">Posted am: ' . $fetch['eintragdatum'] . '.</p>';
                echo '<p align="center">von: ' . $fetch['email'] . '</p>';
                echo '<table border="1" align="center" width=30%>';
                echo '<tr><td valign="top"><p>' . $fetch['eintrag'] . '</p></td></tr>';
                echo '<tr><td align="right"><p>' . '<a href="%kommentar%.php/">[Kommentar]</a>' . '</p></td></tr>';
                echo '</table>';
                echo '</div>';
            }
            ?>

        </body>
    </html>
    <?php
}
?>