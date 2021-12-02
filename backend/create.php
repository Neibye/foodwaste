<?php
    include("mysql.php");

    if($_POST["name"] == "") {
        header("location: registration.php?error=name");
        exit;
    }
    if($_POST["by"] == "") {
        header("location: registration.php?error=by");
        exit;
    }
    if($_POST["postnr"] == "") {
        header("location: registration.php?error=postnr");
        exit;
    }
    if($_POST["mail"] == "") {
        header("location: registration.php?error=mail");
        exit;
    }

    if($_POST["password"] == "") {
        header("location: registration.php?error=password");
        exit;
    }




$name = $_POST['name'];
$postnr = $_POST['postnr'];
$by = $_POST['by'];
$mail = $_POST['mail'];
$lowerCaseMail = strtolower($mail);
$password = $_POST['password'];

$passEncrypt = password_hash($password, PASSWORD_DEFAULT);

$CreateNewPartner = "CALL CreateNewPartner('$name', '$postnr', '$by', '$mail', '$passEncrypt')";

if ($mySQL->query($CreateNewPartner) === TRUE) {
    header("location: ../loginpage.php?signup=succes");
    exit;
} else {
    header("location: registration.php?signup=failed");
    exit;
}



?>



