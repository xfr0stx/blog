<?php
session_start();
if($_SESSION["loginOK"]!=true){
    header("Location: index.php");
}else{
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
test1-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bl0gster</title>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>
    <body>
        <h1>Your in! Welcome to the Bl0gster</h1>
          <form action="eintrag_posten.php" method="POST">
              Title <input type="text" size="20" value="" name="titel"><br><br>
              Beitrag<br> <textarea name="eintrag" cols="50" rows="10" value="" style="width: 621px; height: 186px;;"></textarea> <br>
            <input type="submit" value="Posten!">
        </form>
        <a href="logout.php">Logout!</a>
        <?php
        include_once "db/dbcon.php";
        $sql ="SELECT eintrag FROM eintrag";
        
        $abfrage =mysqli_query($con,$sql);
       ?>
        
        <?php
        echo '<br>';
        echo '<br>';
        echo '<table align ="center" border="2">';
        while($fetch= mysqli_fetch_assoc($abfrage)){
            echo '<tr>';
            echo'<td align="center">',$fetch['eintrag'], '</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
            
    </body>
</html>
<?php

}
    ?>

