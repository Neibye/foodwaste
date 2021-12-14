<?php
session_start();
include("mysql.php");

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

$produktId = $_GET['product'];
//echo $produktId . "<br>";
$produktNavn = $_POST['produktNavnEdit'];
//echo $produktNavn . "<br>";
$produktKategori = $_POST['produktKategoriEdit'];
//echo $produktKategori  . "<br>";
$antal = $_POST['antalEdit'];
//echo $antal . "<br>";
$datoForUdlob = $_POST['datoForUdlobEdit'];
//echo $datoForUdlob . "<br>";
$oldPrice = $_POST['oldPriceEdit'];
//echo $oldPrice . "<br>";
$newPrice = $_POST['newPriceEdit'];
//echo $newPrice . "<br>";
$partnerId = $_SESSION['partnerId'];
//echo $partnerId . "<br>";

$updateProductsql = "UPDATE listedProducts SET foodName = '$produktNavn', foodGroup = '$produktKategori', quantity = '$antal', expDate = '$datoForUdlob', oldPrice = '$oldPrice', newPrice = '$newPrice' WHERE id = '$produktId'";
// $listProductSQL = "INSERT INTO listedproducts (partnerId, foodName, foodGroup, quantity, expDate, oldPrice, newPrice) 
// VALUES ('$partnerId', '$produktNavn', '$produktKategori', '$antal', '$datoForUdlob', '$oldPrice', '$newPrice')";

if (isset($_POST)) {
    $mySQL->query($updateProductsql);
    header("location: ../index.php?update=succes");
    exit;
} else {
    header("location: ../index.php?update=failed");
    exit;
}


?>