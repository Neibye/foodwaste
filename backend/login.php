<?php
session_start();
include("mysql.php");

// Hverken mail eller password må være tomt
if($_POST["loginMail"] == "") {
    header("location: loginpage.php?error=Mail");
    exit;
}
if($_POST["loginPassword"] == "") {
    header("location: loginpage.php?error=Password");
    exit;
}

// Tager kun hver gruppe en gang, så der ikke kommer flere grupper med samme navn
$foodGroupsSQL = "SELECT DISTINCT foodGroup FROM foodlist";

// Laver et tomt array
$allFoodGroups = [];

// Laver en variabel som indeholder vores resultater, fra vores kald
$foodGroupsResult = $mySQL->query($foodGroupsSQL);

// Hvis row ikke er i allFoodGroups arrayet, så sætter det row ind
while($row = $foodGroupsResult->fetch_assoc()) {
    if(!in_array($row, $allFoodGroups)) {
        $allFoodGroups[] = $row;
    }
}

// Laver session med vores nye array
$_SESSION['allFoodGroups'] = $allFoodGroups;

// Laver variabler som indeholder value fra input felter
$loginMail = $_POST['loginMail'];
$loginPassword = $_POST['loginPassword'];

// Laver en variabel som indeholder vores SQL kald
$partnerLoginSQL = "SELECT mail, partnerPassword, id FROM partnerLogin WHERE mail = '$loginMail'";

// Session som er baseret på mail (strtolower laver det om til små bogstaver)
$_SESSION['post_loginMail'] = strtolower($loginMail);

// Laver et kald til databasen, og finder den person med matchende mail.
if(isset($_POST)) { 
    $partnerLoginResult = $mySQL->query($partnerLoginSQL)->fetch_object();
    // Herunder tager vi personens hashkode fra databasen, og sætter ind i variablen $hashkey
    $hashkey = $partnerLoginResult->partnerPassword;
    // Bruger indbygget PHP funktion til at verificere om koderne stemmer overens.
    $passVerify = password_verify($loginPassword, $hashkey);
    // Tjekker om $passVerify er true og om mailen stemmer overens med koden.
    if ($passVerify && $partnerLoginResult->mail = $loginMail) {
        // Laver en variabel med partnerens id
        $partnerId = $partnerLoginResult->id;
        // Laver en variabel som indeholder et SQL kald, som tager navn og id fra partneren der er logget ind
        $partnerNameSQL = "SELECT navn, id FROM partners WHERE partnerLogin = $partnerId";
        // Laver et kald til databasen, som finder partneren med det matchende id
        $partnerNameResult = $mySQL->query($partnerNameSQL)->fetch_object();
        // Session med den partners navn og id, som vi bruger til at kunne se det på siden (Vores header)
        $_SESSION['partnerName'] = $partnerNameResult->navn;
        $_SESSION['partnerId'] = $partnerNameResult->id;
        header("location: ../index.php");
        exit;
    } else {
        header("location: ../loginpage.php?login=failed");
        session_destroy();
        exit;
    }
}

?>
