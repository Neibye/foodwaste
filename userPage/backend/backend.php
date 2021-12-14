<?php

session_start();
include("mysql.php");

if ($_GET['id'] == "logout") {
    session_destroy();
    header("location: ../loginpage.php");
    exit;
}

?>