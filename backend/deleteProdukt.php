<?php

session_start();
include("mysql.php");

// Laver en variabel som henter produktets ID
$produktId = $_GET['product'];

// Tjekker om der er noget i GET
if(isset($_GET["product"])) {
    // Sletter produkt fra listen, hvor id'en er det samme som variablen $produktId
    $deleteSql = "DELETE FROM listedproducts WHERE id = $produktId";
    $mySQL->query($deleteSql);
    header("location: ../index.php?delete=succes");
    exit;
} else {
    header("location: ../index.php?delete=failed");
    exit;
}

?>