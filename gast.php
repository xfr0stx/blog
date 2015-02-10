<!DOCTYPE html>
<?php
session_start();
if($_SESSION["loginOK"]!=true){
    header("Location: index.php");
}else{
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bl0gster</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>
        <h1>Your in! Welcome to the Bl0gster</h1>
        <a href="logout.php">Logout!</a>
        <?php
        include_once "db/dbcon.php";
        $sql ="SELECT titel,eintrag,eintragdatum FROM eintrag";
        
        $abfrage =mysqli_query($con,$sql);
       ?>
        
        <?php
        echo '<br>';
        echo '<br>';
        #echo '<table align ="center" border="2">';
        while($fetch= mysqli_fetch_assoc($abfrage)){
            echo '<div style="text-align: justify;">';
            echo '<h2>'.$fetch['titel'].'</h2>';
            echo '<p>Posted am: '.$fetch['eintragdatum'].'</p>';
            echo '<table border="1" align="center" width=30%>';
            echo '<tr><td valign="top"><p>'.$fetch['eintrag'].'</p></td></tr>';
            echo '<tr><td align="right"><p>'.'<a href="%kommentar%.php/">[Kommentar]</a>'.'</p></td></tr>';
            echo '</table>';
            echo '</div>';
        }
        echo '</table>';
        ?>
            
    </body>
</html>
<?php

}
    ?>

