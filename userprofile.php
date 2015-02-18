<!--  Die Benutzerdaten werden angezeigt und können aktualisiert werden.
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
            <h1>Profile bearbeiten, dude!</h1>
            <form action="./jobs/updateuser_job.php" method="POST">
                Neue-Email <input type="email" size="20" value="" name="email"><br><br>
                Geburtsdatum (dd.mm.yyyy) <input type="date" size="20" value="" name="geburtsdatum"  pattern="^(31|30|0[1-9]|[12][0-9]|[1-9])\.(0[1-9]|1[012]|[1-9])\.((18|19|20)\d{2}|\d{2})$"><br><br>
                Password <input type="Password" size="20" value="" name="passwort" ><br>
                Strasse Nr. <input type="text" size="20" value="" name="strasse" required>
                <input type="text" size="5" value="" name="hausnummer" required><br>
                PLZ Ort <input type="text" size="5" value="" name="plz" required>
                <input type="text" size="5" value="" name="ort" required><br>
                <input type="submit" value="Update!">
            </form>
            <?php
            include_once "./db/dbcon.php";
            $idadresse = $_SESSION["userad"];
          #  $ustmt=$con->query("SELECT u.iduser,u.email,u.geburtsdatum, ad.strasse, ad.hausnummer, ad.plz, ad.ort FROM adresse ad INNER JOIN user u ON adresse_idadresse=\"$idadresse\"");
            $sql = "SELECT u.iduser,u.email,u.geburtsdatum, ad.strasse, ad.hausnummer, ad.plz, ad.ort FROM adresse ad INNER JOIN user u ON adresse_idadresse=idadresse WHERE idadresse =$idadresse";
            $abfrage = mysqli_query($con, $sql);
            var_dump($sql . $abfrage->num_rows);
            while ($fetch = mysqli_fetch_assoc($abfrage)) {
                echo '<div style="text-align: justify;">';
                echo '<table border="1" align="center" width=30%>';
                echo '<tr><td valign="top"><p>Email: ' . $fetch['email'] . '</p></td></tr>';
                echo '<tr><td valign="top"><p> Geburtsdatum: ' . $fetch['geburtsdatum'] . '</p></td></tr>';
                echo '<tr><td valign="top"><p> Straße: ' . $fetch['strasse'] . '</p></td></tr>';
                echo '<tr><td valign="top"><p> Hausnummer: ' . $fetch['hausnummer'] . '</p></td></tr>';
                echo '<tr><td valign="top"><p> PLZ: ' . $fetch['plz'] . '</p></td></tr>';
                echo '<tr><td valign="top"><p> Ort: ' . $fetch['ort'] . '</p></td></tr>';
                echo '</table>';
                echo '</div>';
            }
            ?>
        </body>
    </html>
    <?php
}
?>