<!DOCTYPE html>
<!-- Die blog.php ist der eigentliche Blog, hier werden alle Blogeinträge inkl. 
Datum der Erstellung, Benutzername, ggf. Avatar, Titel und Blogeintrag angezeigt.
Es ist ebenfalls das suchen nach einem Blogtitel möglich. 

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
            <h1>Your in! Welcome to the Bl0gster</h1>

            <?php
            include_once "db/dbcon.php";
            # Es wird eine SELECT-Abfrage auf der Datenbank durchgeführt. Dazu wird zur Vereinfachung eine View verwendet.
            # Das Ergebnis wird verwendet um den Blog darzustellen.
            $stmt = $con->prepare("SELECT ideintrag, titel, eintrag, eintragdatum, email, iduser, kommentare, iduser FROM v_kommentare;")
                    or die("<b>Prepare Error: </b>" . $con->error);
            $stmt->execute();
            $stmt->bind_result($ideintrag, $titel, $eintrag, $eintragdatum, $email, $iduser, $kommentare, $iduser);
            # Es wird überprüft ob nicht der Gast angemeldet ist. Entsprechend wird der BLog formatiert und dargstellt
            
            ##########################
            if ($_SESSION['email'] != 'gast') {
                # uuid wird genutzt um den eingeloggten User zu ermitteln und sein avatar im Blog darzustellen.
                $uuid = $_SESSION['usersession'];

                echo '<br>';
                echo '<br>';
                #Hier wird die Tabelle erstellt um den Blog zu formatieren.
                echo '<table  border ="0" align="center" >';
                echo '<td valign="top" >';
                 echo '<h2>-=Input=-</h2>';
                 # Zeigt den aktuellen eingeloggten User an
               echo'  <hr style="background-color:grey;"noshade width="300" align="center"> ';
                              echo '<b><u>Sie sind angemeldet als:</u></b><br> ';
                echo $_SESSION['email'];
                #Zeigt den Avatar an falls vorhanden ansonsten das Default avatar
                if (file_exists("img/" . $uuid . ".jpg")) {
                    echo "<p align='center'><img src='img/$uuid.jpg' class='avatar'></p>";
                } elseif (file_exists("img/" . $uuid . ".gif")) {
                    echo "<p align='center'><img src='img/$uuid.gif' class='avatar'></p>";
                } else {
                    echo "<p align='center'><img src='img/default.jpg' class='avatar'></p>";
                }
                #Tabelle wird angelegt 
                echo '<table style="word-break:break-all;word-wrap:break-word" border="0" align="center" width="300">';
                echo '<br><br>';
                // es wird überprüft wer eingeloggt ist und dann entsprechend das blog ausgegeben

                echo'  <hr style="background-color:black;"noshade width="300" align="center">
                  
            <form action="./jobs/eintrag_posten.php" method="POST">
                Titel<br> <input type="text" size="20" value="" placeholder ="max. 20 Zeichen" maxlength ="20" name="titel"><br><br />
                Blogeintrag<br> <textarea name="eintrag" cols="50" rows="10" value="" style="width: 300px; height: 186px;;"></textarea> <br>
                <input type="submit" value="Posten!">
            </form>
            <br>
            <hr noshade width="300" size="3" align="center">

            <form action="./jobs/eintrag_suchen.php" method="POST">
                Titel suchen:<br> <input type="text" size="20" value="" name="search"><br><br>
                <input type="submit" value="Search!">
            </form>            
            <hr noshade width="300" size="3" align="center">
            <br>
            <a href="./jobs/logout.php">Logout!</a><br>
            <a href="userprofile.php">UserProfile bearbeiten!</a>
            </table>
            </td>
            <td width ="30" align  valign="top"><p><img src="img/linie.png"></p> </td>
            <td valign="top" >
            <h2>-=Blogeinträge=-</h2>
            <hr style="background-color:grey;"noshade width="300" align="center">' ;


                while ($stmt->fetch()) {

                    echo '<div style="text-align: justify">';
                    echo '<h2>' . $titel . '</h2>';
                    // strototime Wandelt die Uhrzeit in das deutsche Datum - Zeitformat um.
                    
                    ##########################
                    echo '<p align="center">Posted am: ' . $datum_deutsch = date('d.m.Y H:i:s', strtotime($eintragdatum)) . '.</p>';
                    ##########################
                    
                    echo '<p align="center">von: ' . $email . '</p>';
//                Falls die Datei im Ordner img/*.gif oder .jpg exististiert wird das Image/Avatar angezeigt und mithilfe von CSS (class)
//                auf die bestimmte Größe formatiert. Ansonsten wird das default-Bild angezeigt.
                    
                    ##########################
                    if (file_exists("img/" . $iduser . ".jpg")) {
                        echo "<p align='center'><img src='img/$iduser.jpg' class='avatar'></p>";
                    } elseif (file_exists("img/" . $iduser . ".gif")) {
                        echo "<p align='center'><img src='img/$iduser.gif' class='avatar'></p>";
                    } else {
                        echo "<p align='center'><img src='img/default.jpg' class='avatar'></p>";
                    }
                    
                    ##########################
                    
                    
                    echo '<table style="word-break:break-all;word-wrap:break-word" border="0" align="center" width="300">';

                    echo '<tr><td bgcolor ="#E2E2E2" width ="300" valign="top"><FONT COLOR="#5B496E">' . $eintrag . '</td></tr>';
//                Der ID des Eintrags wird in der Variable id (?id=) gespeichert. So kann später über GET die Variable abgefragt werden.
                    
                    ##########################
                    echo '<tr><td bgcolor="#A1B5C6" width ="300" align="right"><FONT COLOR="#5B496E">' . '<a href="kommentare.php?id=' . $ideintrag . '">Kommentare(' . $kommentare . ')</a>' . '</p></td></tr>';
                    ##########################
                    
                    echo '</table>';
                    echo '</div>';
                    echo '<hr noshade width="300" size="3" align="center">';
                }
                
                ##########################
            } else {
               
                echo '<b><u>Sie sind angemeldet als: Gast</u></b><br><br>';
                echo'<a href="./jobs/logout.php">Logout!</a><br>';
                while ($stmt->fetch()) {


                    echo '<div style="text-align: justify">';
                    echo '<h2>' . $titel . '</h2>';
                    echo '<p align="center">Posted am: ' . $eintragdatum . '.</p>';
                    echo '<p align="center">von: ' . $email . '</p>';
                    if (file_exists("img/" . $iduser . ".jpg")) {
                        echo "<p align='center'><img src='img/$iduser.jpg' class='avatar'></p>";
                    } elseif (file_exists("img/" . $iduser . ".gif")) {
                        echo "<p align='center'><img src='img/$iduser.gif' class='avatar'></p>";
                    } else {
                        echo "<p align='center'><img src='img/default.jpg' class='avatar'></p>";
                    }
                    echo '<table style="word-break:break-all;word-wrap:break-word" border="0" align="center" width="300">';
                    echo '<tr><td bgcolor ="#E2E2E2" width ="300" valign="top"><FONT COLOR="#5B496E">' . $eintrag . '</td></tr>';
                    echo '<tr><td bgcolor="#A1B5C6" width ="300" align="right"><FONT COLOR="#5B496E">' . '<a href="kommentare.php?id=' . $ideintrag . '">Kommentare(' . $kommentare . ')</a>' . '</p></td></tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '<hr noshade width="300" size="3" align="center">';
                    echo '</td>';
                    echo '</table>';
                }
            }
            ?>

        </body>
    </html>
    <?php
}
?>