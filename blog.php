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
                Title<br> <input type="text" size="20" value="" name="titel"><br><br>
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
            $sql = "SELECT ideintrag, eintrag.titel,eintrag.eintrag,eintrag.eintragdatum,user.email,user.avatar FROM eintrag JOIN user ON eintrag.user_idUser = user.idUser ORDER BY eintrag.ideintrag  DESC";
            $abfrage = mysqli_query($con, $sql);
            # $bstmt = $con->query("SELECT ideintrag, eintrag.titel,eintrag.eintrag,eintrag.eintragdatum,user.email FROM eintrag JOIN user ON eintrag.user_idUser = user.idUser ORDER BY eintrag.ideintrag  DESC");

            echo '<br>';
            echo '<br>';
            while ($fetch = mysqli_fetch_assoc($abfrage)) {
                $ideintrag = $fetch['ideintrag'];
                $commcountchk = mysqli_query($con, "SELECT ideintrag FROM eintrag JOIN kommentar ON  kommentar.eintrag_ideintrag=eintrag.ideintrag WHERE ideintrag=$ideintrag");
                $commcount = mysqli_num_rows($commcountchk);
                var_dump($fetch['avatar']);
                echo '<div style="text-align: justify">';
                echo '<h2>' . $fetch['titel'] . '</h2>';
                echo '<p align="center">Posted am: ' . $fetch['eintragdatum'] . '.</p>';
                echo '<p align="center">von: ' . $fetch['email'] . '</p>';
                echo '<p align="center"><img src="' . $fetch['avatar'] . '"></p>';
                #echo '<p align="center"><img src="img/avatar.jpg"></p>';
                echo '<table style="word-break:break-all;word-wrap:break-word" border="1" align="center" width="300">';
                echo '<tr><td width ="300" valign="top">' . $fetch['eintrag'] . '</td></tr>';
                echo '<tr><td width ="300" align="right"><p>' . '<a href="kommentare.php?id=' . $ideintrag . '">[Kommentare(' . $commcount . ')</a>' . '</p></td></tr>';
                echo '</table>';
                echo '</div>';
            }
            ?>

        </body>
    </html>
    <?php
}
?>