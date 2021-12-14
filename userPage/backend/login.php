<?php
session_start();
include("mysql.php");
        
    if($_POST["loginMail"] == "") {
        header("location: loginpage.php?error=Mail");
        exit;
    }
    if($_POST["loginPassword"] == "") {
        header("location: loginpage.php?error=Password");
        exit;
    }

$foodGroupsSQL = "SELECT DISTINCT foodGroup FROM foodlist";

$allFoodGroups = [];

$foodGroupsResult = $mySQL->query($foodGroupsSQL);

while($row = $foodGroupsResult->fetch_assoc()) {
    if(!in_array($row, $allFoodGroups)) {
        $allFoodGroups[] = $row;
    }
}

$_SESSION['allFoodGroups'] = $allFoodGroups;

$loginMail = $_POST['loginMail'];
$loginPassword = $_POST['loginPassword'];

$userLoginSQL = "SELECT mail, userPassword, id FROM userLogin WHERE mail = '$loginMail'";

    
$_SESSION['post_loginMail'] = strtolower($loginMail);

if(isset($_POST)) { 
    $userLoginResult = $mySQL->query($userLoginSQL)->fetch_object();
    $hashkey = $userLoginResult->userPassword;
    $passVerify = password_verify($loginPassword, $hashkey);


    if ($passVerify && $userLoginResult->mail == $loginMail) {
        $partnerId = $userLoginResult->id;
        $userNameSQL = "SELECT navn, id FROM partners WHERE partnerLogin = $partnerId";
        $userNameResult = $mySQL->query($userNameSQL)->fetch_object();
        $_SESSION['userName'] = $userNameResult->navn;
        $_SESSION['userId'] = $userNameResult->id;
        $_SESSION['userPostNr'] = $userNameResult->postNr;
        header("location: ../index.php");
        exit;
    } else {
        header("location: ../loginpage.php?login=failed");
        session_destroy();
        exit;
    }
}

?>