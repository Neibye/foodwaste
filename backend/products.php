<?php
session_start();
$partnerId = $_SESSION['partnerId'];
include("mysql.php");

class Product {
    public $id = 0;
    public $partnerId = "";
    public $produktNavn = "";
    public $produktKategori = "";
    public $antal = 0;
    public $datoForUdlob = 0;
    public $oldPrice = 0;
    public $newPrice = 0;

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
    $product->SetQuantity($value["quantity"]);
    $product->SetProductCategori($value["foodGroup"]);
    $product->SetExpDate($value["expDate"]);
    $product->SetOldPrice($value["oldPrice"]);
    $product->SetNewPrice($value["newPrice"]);

    array_push($productArray, $product);

        // createProduct($product->GetId, $product->GetPartnerId, $product->GetProductName, $product->GetProductCategori, $product->GetQuantity, $product->GetExpDate, $product->GetOldPrice, $product->GetNewPrice, )

}

//var_dump($productArray[1]); 
// echo $productArray[0]->produktNavn;

$productMaxLength = count($productArray);
// echo $productMaxLength;

for ($i=0; $i < $productMaxLength; $i++) { 
    $productIdValue = $productArray[$i]->id;
    $partnerIdValue = $productArray[$i]->partnerId;
    $productNameValue = $productArray[$i]->produktNavn;
    $productCategoriValue = $productArray[$i]->produktKategori;
    $productQuantityValue = $productArray[$i]->antal;
    $expDateValue = $productArray[$i]->datoForUdlob;
    $oldPriceValue = $productArray[$i]->oldPrice;
    $newPriceValue = $productArray[$i]->newPrice;
    echo "Produkt id = " . $productIdValue . "<br>";
    echo "Partner id = " . $partnerIdValue . "<br>";
    echo "Produkt navn = " . $productNameValue . "<br>";
    echo "Produkt kategori = " . $productCategoriValue . "<br>";
    echo "Antal = " . $productQuantityValue . "<br>";
    echo "Udløbsdato = " . $expDateValue . "<br>";
    echo "Gammel pris = " . $oldPriceValue . "<br>";
    echo "Ny pris = " . $newPriceValue . "<br><br>";
    ?>
    <script> createProduct(<?php echo "$partnerIdValue"; ?>, <?php echo "$productNameValue"; ?>, <?php echo "$productCategoriValue"; ?>, <?php echo "$productQuantityValue"; ?>, <?php echo "$expDateValue"; ?>, <?php echo "$oldPriceValue"; ?>, <?php echo "$newPriceValue";  ?> )</script>
   <?php
}
// foreach ($productArray as $product) {
//     createProduct($product->GetId, $product->GetPartnerId, $product->GetProductName, $product->GetProductCategori, $product->GetQuantity, $product->GetExpDate, $product->GetOldPrice, $product->GetNewPrice)
// }






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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="product-grid"></div>
    <script type="text/JavaScript" src="../js/updateJson.js"> 
     
     </script>
</body>
</html>