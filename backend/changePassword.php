<?php
session_start();
include("mysql.php");

$loginMail = $_SESSION['post_loginMail'];
$nytKodeord = $_POST['nytKodeord'];
$gentagKodeord = $_POST['gentagKodeord'];


$passEncrypt = password_hash($nytKodeord, PASSWORD_DEFAULT);


$skiftPassword = "UPDATE partnerLogin SET partnerPassword = '$passEncrypt' WHERE mail = '$loginMail'";


if (isset($_POST)) {
    if ($nytKodeord == $gentagKodeord) {
        mysqli_query($mySQL, $skiftPassword);
        header("location: ../index.php?changepassword=succces");
    } else
        header("location: ../index.php?changepassword=failed");
}

?>