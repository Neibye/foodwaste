<?php
include("mysql.php");
class Product {
    private $id = 0;
    private $partnerId = "";
    private $produktNavn = "";
    private $produktKategori = "";
    private $antal = 0;
    private $datoForUdlob = 0;
    private $oldPrice = 0;
    private $newPrice = 0;

    public function GetId() {
        return $this->id;
    }

    public function GetPartnerId() {
        return $this->partnerId;
    }

    public function GetProductName() {
        return $this->produktNavn;
    }

    public function GetProductCategori() {
        return $this->produktKategori;
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

$productsSQL = "SELECT * FROM listedproducts";

$products = [];

$productsResult = $mySQL->query($productsSQL);

while($row = $productsResult->fetch_assoc()) {
    if(!in_array($row, $products)) {
        $products[] = $row;
    }
}

$productArray = array();

foreach ($products as $value) {
    $product = new Product();
    $product->SetId($value["id"]);
    $product->SetPartnerId($value["partnerId"]);
    $product->SetProductName($value["foodName"]);
    $product->SetQuantity($value["foodGroup"]);
    $product->SetProductCategori($value["quantity"]);
    $product->SetExpDate($value["expDate"]);
    $product->SetOldPrice($value["oldPrice"]);
    $product->SetNewPrice($value["newPrice"]);

     array_push($productArray, $product);
}

var_dump($productArray);


// $mainPerson;

// foreach ($userArray as $person) {
//     $personMail = $person->GetMail();
//     if ($personMail == $loginMail) {
//             $mainPerson = $person;
//     }
// }

//     if(isset($_POST['action'])) {
//         // If the 'upload' action is called, then do this
//         if($_POST['action'] == "upload") {
//             // Creates a new instance of the FileUpload class
//             $newUpload = new FileUpload($_FILES['fileToUpload']);
//             $newUpload->RenameFile($_SESSION['userId'] . "-" . $newUpload->GetFileName());
//             $response = $newUpload->UploadFile("../files/");
        
//             $_SESSION['jsonFile'] = $response;

//             // ---------------------------------------------------------------------------
//             // Fill in all of the actions that is needed to do the actual upload, based on
//             // the methods you have created inside your FileUpload class
//             // ---------------------------------------------------------------------------


//             // Redirect back to the index.php page
//             header("location: ../match.php");
//         }
//     }






?>