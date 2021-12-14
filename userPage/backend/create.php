<?php
    include("mysql.php");

if (!isset($_POST['action'])) {
    header("location: ../registration.php?unautharised-user");
    exit;
}

if ($_POST['action'] == "create") {

    if($_POST["navn"] == "") {
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
    if($_POST["tlfNr"] == "") {
        header("location: registration.php?error=TelefonNr");
        exit;
    }
    if($_POST["mail"] == "") {
        header("location: registration.php?error=mail");
        exit;
    }

    if($_POST["userPassword"] == "") {
        header("location: registration.php?error=password");
        exit;
    }


    $navn = $_POST['navn'];
    $by = $_POST['by'];
    $postnr = $_POST['postnr'];
    $tlfNr = $_POST['tlfNr'];
    $mail = $_POST['mail'];
    $lowerCaseMail = strtolower($mail);
    $password = $_POST['userPassword'];

    $passEncrypt = password_hash($password, PASSWORD_DEFAULT);


    $CreateNewUser = "CALL CreateNewUser('$navn', '$tlfNr', '$postnr', '$by', '$mail', '$passEncrypt')";

    if ($mySQL->query($CreateNewUser) === TRUE) {
        header("location: ../loginpage.php?signup=succes");
        exit;
    } else {
        header("location: registration.php?signup=failed");
        exit;
    } 
}




?>



