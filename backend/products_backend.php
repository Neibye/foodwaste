<?php
session_start();
$partnerId = $_SESSION['partnerId'];
include("mysql.php");

class Product {
    public $id = 0;
    public $partnerId = 0;
    public $foodName = "";
    public $foodGroup = "";
    public $quantity = 0;
    public $expDate = 0;
    public $oldPrice = 0;
    public $newPrice = 0;


    public function getArray() {
        $jsonInput["id"] = $this->id;
        $jsonInput["partnerId"] = $this->partnerId;
        $jsonInput["foodName"] = $this->foodName;
        $jsonInput["foodGroup"] = $this->foodGroup;
        $jsonInput["quantity"] = $this->quantity;
        $jsonInput["expDate"] = $this->expDate;
        $jsonInput["oldPrice"] = $this->oldPrice;
        $jsonInput["newPrice"] = $this->newPrice;

        return $jsonInput;
    }
}

if (isset($_GET["partnerId"])) {
    $partnerIdGet = $_GET["partnerId"];
    $productsSQL = "SELECT * FROM listedProducts WHERE partnerId = '$partnerIdGet'";
    $products = [];
    $productsResult = $mySQL->query($productsSQL);
    while($row = $productsResult->fetch_object("Product")) {
        if(!in_array($row, $products)) {
            $products[] = $row;
        }
    }
    $json = [];
    foreach ($products as $product) {
        $json[] = $product->getArray();
    }
} else {
    $json["error"] = "Ingen partner id fundet";
}

echo json_encode($json);
?>








