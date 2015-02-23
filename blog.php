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
            <hr style="background-color:black;"noshade width="500" align="center">
            <form action="./jobs/eintrag_posten.php" method="POST">
                Title<br> <input type="text" size="20" value="" name="titel"><br><br />
                Beitrag<br> <textarea name="eintrag" cols="50" rows="10" value="" style="width: 621px; height: 186px;;"></textarea> <br>
                <input type="submit" value="Posten!">
            </form>
            <br>
            <hr noshade width="300" size="3" align="center">

            <form action="./jobs/eintrag_suchen.php" method="POST">
                Eintrag suchen:<br> <input type="text" size="20" value="" name="search"><br><br>
                <input type="submit" value="Search!">
            </form>            
            <hr noshade width="300" size="3" align="center">
            <br>
            <a href="./jobs/logout.php">Logout!</a><br>
            <a href="userprofile.php">UserProfile bearbeiten!</a>
            <?php
            include_once "db/dbcon.php";
            
            $stmt = $con->prepare("SELECT ideintrag, titel, eintrag, eintragdatum, email, iduser, kommentare, iduser FROM v_kommentare;")
                    or die("<b>Prepare Error: </b>" . $con->error);
            $stmt->execute();
            $stmt->bind_result($ideintrag, $titel, $eintrag, $eintragdatum, $email, $iduser ,$kommentare, $iduser);
            echo '<br>';
            echo '<br>';
                      
            while ($stmt->fetch()) {
                echo '<div style="text-align: justify">';
                echo '<h2>' . $titel . '</h2>';
                echo '<p align="center">Posted am: ' . $eintragdatum . '.</p>';
                echo '<p align="center">von: ' . $email . '</p>';
                if(file_exists("img/" . $iduser . ".jpg")){
                    echo "<p align='center'><img src='img/$iduser.jpg' class='avatar'></p>";
                } elseif(file_exists("img/" . $iduser . ".gif")) {
                    echo "<p align='center'><img src='img/$iduser.gif' class='avatar'></p>";
                } else {
                    echo "<p align='center'><img src='img/default.jpg' class='avatar'></p>";
                }
                echo '<table style="word-break:break-all;word-wrap:break-word" border="1" align="center" width="300">';
                echo '<tr><td width ="300" valign="top">' . $eintrag . '</td></tr>';
                echo '<tr><td width ="300" align="right"><p>' . '<a href="kommentare.php?id=' . $ideintrag . '">Kommentare(' . $kommentare . ')</a>' . '</p></td></tr>';
                echo '</table>';
                echo '</div>';
            }
            ?>

        </body>
    </html>
    <?php
}
?>