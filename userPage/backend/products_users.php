<?php
session_start();
$loginMail = $_SESSION['post_loginMail'];
include("mysql.php");

class Product {
    public $id = 0;
    public $navn = "";
    public $foodName = "";
    public $foodGroup = "";
    public $quantity = 0;
    public $expDate = 0;
    public $oldPrice = 0;
    public $newPrice = 0;
    public $postNr = 0;
    
    public function getJson() {
        $jsonInput["id"] = $this->id;
        $jsonInput["navn"] = $this->navn;
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
        $jsonInput["navn"] = $this->navn;
        $jsonInput["foodName"] = $this->foodName;
        $jsonInput["foodGroup"] = $this->foodGroup;
        $jsonInput["quantity"] = $this->quantity;
        $jsonInput["expDate"] = $this->expDate;
        $jsonInput["oldPrice"] = $this->oldPrice;
        $jsonInput["newPrice"] = $this->newPrice;
        $jsonInput["postNr"] = $this->postNr;

        return $jsonInput;
    }

    public function GetId() {
        return $this->id;
    }
    public function GetPartnerName() {
        return $this->navn;
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
    public function GetPostNr() {
        return $this->postNr;
    }

// Herunder laver vi nogle funktioner som opdaterer/ændrer vores objekters variablers properties.

    public function SetId($newId) {
        $this->id = $newId;
    }
    public function SetPartnerId($newPartnerName) {
        $this->navn = $newPartnerName;
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
    public function SetPostNr($newPostNr) {
        $this->postNr = $newPostNr;
    }

}

$test = "test";
if (isset($test)) {
    $productsSQL = "SELECT listedProducts.id, partners.navn, listedProducts.foodName, listedProducts.foodGroup, listedProducts.quantity, listedProducts.expDate, listedProducts.oldPrice, listedProducts.newPrice, postnrtable.postNr FROM listedProducts INNER JOIN partners ON listedProducts.partnerId = partners.id INNER JOIN postnrtable ON partners.postnr = postnrtable.id";
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
    $json["error"] = "Ingen er logget ind";
}

echo json_encode($json);
?>