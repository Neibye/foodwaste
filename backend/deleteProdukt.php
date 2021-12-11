<?php
session_start();
include("mysql.php");

$produktId = $_GET['product'];

if(isset($_GET["product"])) {
    $deleteSql = "DELETE FROM listedproducts WHERE id = $produktId";
    $mySQL->query($deleteSql);
    header("location: ../index.php?delete=succes");
    exit;
} else {
    header("location: ../index.php?delete=failed");
    exit;
}




?>