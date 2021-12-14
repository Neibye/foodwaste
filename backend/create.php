<?php
    include("mysql.php");

// Sikkerhed for at alt er skrevet ind korrekt
if (!isset($_POST['action'])) {
    header("location: ../registration.php?unautharised-user");
    exit;
}

if ($_POST['action'] == "create") {

    if($_POST["name"] == "") {
        header("location: ../registration.php?error=name");
        exit;
    }
    if($_POST["by"] == "") {
        header("location: ../registration.php?error=by");
        exit;
    }
    if($_POST["postnr"] == "") {
        header("location: ../registration.php?error=postnr");
        exit;
    }
    if($_POST["mail"] == "") {
        header("location: ../registration.php?error=mail");
        exit;
    }

    if($_POST["password"] == "") {
        header("location: ../registration.php?error=password");
        exit;
    }

// Her laver vi variabler med de forskellige input fields values, som vi henter via POST
    $name = $_POST['name'];
    $postnr = $_POST['postnr'];
    $by = $_POST['by'];
    $mail = $_POST['mail'];
    $lowerCaseMail = strtolower($mail);
    $password = $_POST['password'];

// Kryptere password for sikkerhed
    $passEncrypt = password_hash($password, PASSWORD_DEFAULT);

// Her laver vi en variabel, som inderholder vores kald til vores procedure
    $CreateNewPartner = "CALL CreateNewPartner('$name', '$postnr', '$by', '$mail', '$passEncrypt')";

// Hvis det her kald er TRUE, så bliver man sendt til login siden (succes) - Ellers failed
    if ($mySQL->query($CreateNewPartner) === TRUE) {
        header("location: ../loginpage.php?signup=succes");
        exit;
    } else {
        header("location: ../registration.php?signup=failed");
        exit;
    } 
}

?>