<?php
include_once "db/dbcon.php";

$email = $_POST["email"];
$userpass = $_POST["passwort"];
#$escaped_passwort = mysqli_real_escape_string($con,$_POST["passwort"]);
#$userpass = $hashedpw = hash('sha512',$escaped_passwort);



$sql = "SELECT email,passwort FROM blog.user WHERE email=\"$email\" AND passwort=$userpass";
$abfrage =mysqli_query($con,$sql);

 if($abfrage->num_rows>=1)
 {
   session_start();
   $_SESSION["loginOK"] =true;
   $_SESSION_["idUser"] = $row->idUser;
   echo "Ok, darfst rein!";
  header("Location: blog.php"); 
 }
 
 else{

    header("Location: index.php");
}
?>