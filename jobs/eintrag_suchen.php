<!DOCTYPE html>
<!-- Der Benutzer wird regsitriert, also in die DB eingetragen und 
erhält eine Bestätigung der registrierung.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bl0gster</title>
        <link rel="stylesheet" type="text/css" href="../design.css">
    </head>
     
    <body>
        <h1>Search!</h1>
        Zurück zum
        <a href="../blog.php">Blog!</a>
        <?php
        include_once "../db/dbcon.php";
        $escaped_search = mysqli_real_escape_string($con, $_POST["search"]);
        #$sql = "SELECT eintrag.titel,eintrag.eintrag,eintrag.eintragdatum,user.email,user.avatar FROM eintrag JOIN user ON eintrag.user_idUser = user.idUser WHERE eintrag.titel LIKE '%$escaped_search%' ORDER BY eintrag.ideintrag  DESC";   
        
         $stmt = $con->prepare("SELECT eintrag.titel,eintrag.eintrag,eintrag.eintragdatum,user.email,user.avatar FROM eintrag JOIN user ON eintrag.user_idUser = user.idUser WHERE eintrag.titel LIKE  concat('%',?,'%')  ORDER BY eintrag.ideintrag  DESC")
                            or die("<b>Prepare Error: </b>" . $con->error);

                    $stmt->bind_param("s", $escaped_search);
                    $stmt->execute();
        $stmt->bind_result($titel,$eintrag,$eintragsdatum,$email,$avatar);
       # $abfrage = mysqli_query($con, $sql);
            
             while ($stmt->fetch()) {
                
                echo '<div style="text-align: justify">';
                echo '<h2>' . $titel . '</h2>';
                echo '<p align="center">Posted am: ' . $eintragsdatum . '.</p>';
                echo '<p align="center">von: ' . $email . '</p>';
                #echo '<p align="center"><img src="img/avatar.jpg"></p>';
                echo '<table style="word-break:break-all;word-wrap:break-word" border="1" align="center" width="300">';
                echo '<tr><td width ="300" valign="top">' . $eintrag . '</td></tr>';
                echo '</table>';
                echo '</div>';
             }
                ?>
       
  
    </body>
</html>