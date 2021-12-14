<?php

session_start();
include("mysql.php");

// Variable som indeholder sessions value
$loginMail = $_SESSION['post_loginMail'];

// Tager value fra input felter
$nytKodeord = $_POST['nytKodeord'];
$gentagKodeord = $_POST['gentagKodeord'];

// Kryterer vi password
$passEncrypt = password_hash($nytKodeord, PASSWORD_DEFAULT);
// Vi laver et update SQL statement
$skiftPassword = "UPDATE partnerlogin SET partnerPassword = '$passEncrypt' WHERE mail = '$loginMail'";

// Tjekker om der er noget POST, og tjekker om de 2 password er ens. Derefter kalder vi til vores database, med vores tidligere SQL statement.
if (isset($_POST)) {
    if ($nytKodeord == $gentagKodeord) {
        mysqli_query($mySQL, $skiftPassword);
        header("location: ../index.php?changepassword=succces");
    } else
        header("location: ../index.php?changepassword=failed");
}

?>