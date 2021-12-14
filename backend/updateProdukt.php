<?php
session_start();
include("mysql.php");

// Hvis feltet er tomt = error
if($_POST["produktNavnEdit"] == "") {
    header("location: loginpage.php?error=produktNavn");
    exit;
}
if($_POST["produktKategoriEdit"] == "") {
    header("location: index.php?error=produktKategori");
    exit;
}
if($_POST["antalEdit"] == "") {
    header("location: index.php?error=amount");
    exit;
}
if($_POST["datoForUdlobEdit"] == "") {
    header("location: loginpage.php?error=datoForUdlob");
    exit;
}
if($_POST["oldPriceEdit"] == "") {
    header("location: loginpage.php?error=oldPrice");
    exit;
}
if($_POST["newPriceEdit"] == "") {
    header("location: index.php?error=newPrice");
    exit;
}

// Her laver vi variabler med de forskellige input fields values, som vi henter via POST, GET & Session
$produktId = $_GET['product'];
$produktNavn = $_POST['produktNavnEdit'];
$produktKategori = $_POST['produktKategoriEdit'];
$antal = $_POST['antalEdit'];
$datoForUdlob = $_POST['datoForUdlobEdit'];
$oldPrice = $_POST['oldPriceEdit'];
$newPrice = $_POST['newPriceEdit'];
$partnerId = $_SESSION['partnerId'];

// Her laver vi en variabel, som inderholder vores kald til vores update kald
$updateProductsql = "UPDATE listedProducts SET foodName = '$produktNavn', foodGroup = '$produktKategori', quantity = '$antal', expDate = '$datoForUdlob', oldPrice = '$oldPrice', newPrice = '$newPrice' WHERE id = '$produktId'";

// Hvis alt er udfyldt skal det køre igennem, ellers failed.
if (isset($_POST)) {
    $mySQL->query($updateProductsql);
    header("location: ../index.php?update=succes");
    exit;
} else {
    header("location: ../index.php?update=failed");
    exit;
}

?>