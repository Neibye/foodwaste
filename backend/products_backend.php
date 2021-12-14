<?php
session_start();
$partnerId = $_SESSION['partnerId'];
include("mysql.php");

// Object oriented programming - Laver en class, som indeholder variables og functions (int eller string)
class Product {
    public $id = 0;
    public $partnerId = 0;
    public $foodName = "";
    public $foodGroup = "";
    public $quantity = 0;
    public $expDate = 0;
    public $oldPrice = 0;
    public $newPrice = 0;

    // Laver et array med class'ens variables
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

// Tager først fat i partner id ved hjælp af get method
if (isset($_GET["partnerId"])) {
    $partnerIdGet = $_GET["partnerId"];
    // Vi laver en variabel med et SQL kald
    $productsSQL = "SELECT * FROM listedProducts WHERE partnerId = '$partnerIdGet'";
    // Tom array
    $products = [];
    // Får resultaterne fra vores database kald
    $productsResult = $mySQL->query($productsSQL);
    // Fetch'er hvert object i vores class, og indsætter i vores tomme array
    while($row = $productsResult->fetch_object("Product")) {
        if(!in_array($row, $products)) {
            $products[] = $row;
        }
    }
    // Laver et tomt array
    $json = [];
    // Tager array $products, og sætter hvert object ind
    foreach ($products as $product) {
        $json[] = $product->getArray();
    }
} else {
    $json["error"] = "Ingen partner id fundet";
}

// Laver array'et $json om til json format, så det kan bruges i frontend
echo json_encode($json);
?>








