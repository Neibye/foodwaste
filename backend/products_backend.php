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
    
    public function getJson() {
        $jsonInput["id"] = $this->id;
        $jsonInput["partnerId"] = $this->partnerId;
        $jsonInput["foodName"] = $this->foodName;
        $jsonInput["foodGroup"] = $this->foodGroup;
        $jsonInput["quantity"] = $this->quantity;
        $jsonInput["expDate"] = $this->expDate;
        $jsonInput["oldPrice"] = $this->oldPrice;
        $jsonInput["newPrice"] = $this->newPrice;

        $jsonOutput = json_encode($jsonInput);
        return $jsonOutput;
    }

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

    public function GetId() {
        return $this->id;
    }

    public function GetPartnerId() {
        return $this->partnerId;
    }

    public function GetProductName() {
        return $this->foodName;
    }

    public function GetProductCategori() {
        return $this->foodGroup;
    }

    public function GetQuantity() {
        return $this->antal;
    }

    public function GetExpDate() {
        return $this->datoForUdlob;
    }

    public function GetOldPrice() {
        return $this->oldPrice;
    }
    
    public function GetNewPrice() {
        return $this->newPrice;
    }

// Herunder laver jeg nogle funktioner som opdatere/ændre mine objekters variablers properties.

    public function SetId($newId) {
        $this->id = $newId;
    }

    public function SetPartnerId($newPartnerId) {
        $this->partnerId = $newPartnerId;
    }

    public function SetProductName($newProductName) {
        $this->produktNavn = $newProductName;
    }

    public function SetQuantity($newQuantity) {
        $this->antal = $newQuantity;
    }

    public function SetProductCategori($newProductCategori) {
        $this->produktKategori = $newProductCategori;
    }

    public function SetExpDate($newExpDate) {
        $this->datoForUdlob = $newExpDate;
    }

    public function SetOldPrice($newOldPrice) {
        $this->oldPrice = $newOldPrice;
    }

    public function SetNewPrice($newNewPrice) {
        $this->newPrice = $newNewPrice;
    }

}
if (isset($_GET["partnerId"])) {
    $partnerIdGet = $_GET["partnerId"];
    $productsSQL = "SELECT * FROM listedproducts WHERE partnerId = '$partnerIdGet'";
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








