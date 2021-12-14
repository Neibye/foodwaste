<?php

session_start();
include("mysql.php");

// Hvis logout kommer op i URL'en, så skal den dræbe session, og sende til login page
if ($_GET['id'] == "logout") {
    session_destroy();
    header("location: ../loginpage.php");
    exit;
}

?>