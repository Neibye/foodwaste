<?php 
session_start();
include("mysql.php");

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

$produktNavn = $_POST['produktNavn'];
$produktKategori = $_POST['produktKategori'];
$antal = $_POST['antal'];
$datoForUdlob = $_POST['datoForUdlob'];
$oldPrice = $_POST['oldPrice'];
$newPrice = $_POST['newPrice'];
$partnerId = $_SESSION['partnerId'];

$listProductSQL = "INSERT INTO listedproducts (partnerId, foodName, foodGroup, quantity, expDate, oldPrice, newPrice) 
VALUES ('$partnerId', '$produktNavn', '$produktKategori', '$antal', '$datoForUdlob', '$oldPrice', '$newPrice')";

if (isset($_POST)) {
    $mySQL->query($listProductSQL);
    header("location: ../index.php?upload=succes");
    exit;
} else {
    header("location: ../index.php?upload=failed");
    exit;
}

?>