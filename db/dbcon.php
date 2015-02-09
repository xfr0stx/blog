<?php
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="blog";

$con = new mysqli($host,$user,$password,$dbname,$port,$socket)
        or die('Could not connect to database server' . mysqli_connect_error());
?>