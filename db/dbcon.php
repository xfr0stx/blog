<?php
<<<<<<< HEAD
<<<<<<< HEAD
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="blog";

$con = new mysqli($host,$user,$password,$dbname,$port,$socket)
=======
=======
>>>>>>> origin/master

$host = "localhost";
$port = 3306;
$socket = "";
$user = "root";
$password = "C0mplex";
$dbname = "blog";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
<<<<<<< HEAD
>>>>>>> origin/master
=======
>>>>>>> origin/master
        or die('Could not connect to database server' . mysqli_connect_error());
?>