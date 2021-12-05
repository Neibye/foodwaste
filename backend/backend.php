
<?php
// Logout funktion
session_start();

if ($_GET['id'] == "logout") {
    session_destroy();
    header("location: ../loginpage.php");
    exit;
}
?>