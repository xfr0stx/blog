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
            $id = $_GET["id"];
           # var_dump($id);
            $sql = "SELECT eintrag.titel, kommentar.kommentar,kommentar.datum, user.email FROM kommentar JOIN eintrag ON kommentar.eintrag_ideintrag = eintrag.ideintrag JOIN user ON kommentar.user_iduser = user.idUser WHERE ideintrag = \"$id\" ORDER BY kommentar.idanswere  DESC;";
            $abfrage = mysqli_query($con, $sql);

           #$fetcht = mysqli_fetch_assoc($abfrage);
           #echo '<h2><p align="center"> Kommentare zum Titel: ' . $fetcht['titel'] . '.</p></h2>';
           
            echo '<br>';
            echo '<br>';
            while ($fetch = mysqli_fetch_assoc($abfrage)) {
                
                echo '<div style="text-align: justify">';
                echo '<p align="center">Posted am: ' . $fetch['datum'] . '.</p>';
                echo '<p align="center">von: ' . $fetch['email'] . '</p>';
                echo '<table style="word-break:break-all;word-wrap:break-word" border="1" align="center" width="300">';
                echo '<tr><td width ="300" valign="top">' . $fetch['kommentar'] . '</td></tr>';
                echo '</table>';
                echo '</div>';
            }
            ?>

        </body>
    </html>
    <?php
}
?>