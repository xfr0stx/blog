<!--  Die Session wird bei einem Logout aufgelöst.
Zusätzlich wird die Session Variable zur Sicherheit "genullt"
-->
<?php
session_start();
$_SESSION = null;
session_destroy();
header("Location: ../index.php")
?>