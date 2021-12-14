<?php 
session_start();
include("mysql.php");

// Sikkerhed for at alt er skrevet ind
if($_POST["produktNavn"] == "") {
    header("location: loginpage.php?error=produktNavn");
    exit;
}
if($_POST["produktKategori"] == "") {
    header("location: index.php?error=produktKategori");
    exit;
}
if($_POST["antal"] == "") {
    header("location: index.php?error=amount");
    exit;
}
if($_POST["datoForUdlob"] == "") {
    header("location: loginpage.php?error=datoForUdlob");
    exit;
}
if($_POST["oldPrice"] == "") {
    header("location: loginpage.php?error=oldPrice");
    exit;
}
if($_POST["newPrice"] == "") {
    header("location: index.php?error=newPrice");
    exit;
}

// Her laver vi variabler med de forskellige input fields values, som vi henter via POST & Session
$produktNavn = $_POST['produktNavn'];
$produktKategori = $_POST['produktKategori'];
$antal = $_POST['antal'];
$datoForUdlob = $_POST['datoForUdlob'];
$oldPrice = $_POST['oldPrice'];
$newPrice = $_POST['newPrice'];
$partnerId = $_SESSION['partnerId'];

// Her laver vi en variabel, som inderholder vores kald til vores insert kald
$listProductSQL = "INSERT INTO listedproducts (partnerId, foodName, foodGroup, quantity, expDate, oldPrice, newPrice) 
VALUES ('$partnerId', '$produktNavn', '$produktKategori', '$antal', '$datoForUdlob', '$oldPrice', '$newPrice')";

// Hvis det her kald er TRUE, så bliver man sendt til login siden (succes) - Ellers failed
if (isset($_POST)) {
    $mySQL->query($listProductSQL);
    header("location: ../index.php?upload=succes");
    exit;
} else {
    header("location: ../index.php?upload=failed");
    exit;
}

?>