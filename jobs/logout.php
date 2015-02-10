<!--  Die Session wird bei einem Logout aufgelöst
-->
<?php
session_start();
$_SESSION = null;
session_destroy();
<<<<<<< HEAD:jobs/logout.php
<<<<<<< HEAD:logout.php
header("Location: index.php")
=======
header("Location: ../index.php")
>>>>>>> origin/master:jobs/logout.php
=======
header("Location: ../index.php")
>>>>>>> origin/master:jobs/logout.php
?>
