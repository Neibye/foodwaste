<?php
session_start();
include("mysql.php");

$loginMail = $_SESSION['post_loginMail'];

$nytKodeord = $_POST['nytKodeord'];
$gentagKodeord = $_POST['gentagKodeord'];

$passEncrypt = password_hash($nytKodeord, PASSWORD_DEFAULT);
$skiftPassword = "UPDATE userLogin SET userPassword = '$passEncrypt' WHERE mail = '$loginMail'";


if (isset($_POST)) {
   // $result = $mySQL->query($sql)->fetch_object();
    if ($nytKodeord == $gentagKodeord) {
        //$mySQL->query($skiftPassword);
        mysqli_query($mySQL, $skiftPassword);
        header("location: ../index.php");
    } else
        header("location: ../index.php=changepassword=failed");
}

?>