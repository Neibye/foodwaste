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
             
    $loginMail = $_POST['loginMail'];
    $loginPassword = $_POST['loginPassword'];

    $partnerLoginSQL = "SELECT mail, partnerPassword, id FROM partnerLogin WHERE mail = '$loginMail'";
    
        
    $_SESSION['post_loginMail'] = strtolower($loginMail);

    if(isset($_POST)) { 
        $partnerLoginResult = $mySQL->query($partnerLoginSQL)->fetch_object();
        $hashkey = $partnerLoginResult->partnerPassword;
        $passVerify = password_verify($loginPassword, $hashkey);
        if ($passVerify && $partnerLoginResult->mail = $loginMail) {
            $partnerId = $partnerLoginResult->id;
            $partnerNameSQL = "SELECT navn FROM partners WHERE partnerLogin = $partnerId";
            $partnerNameResult = $mySQL->query($partnerNameSQL)->fetch_object();
            $_SESSION['partnerName'] = $partnerNameResult->navn;
            header("location: ../index.php");
            exit;
        } else {
            header("location: ../loginpage.php?login=failed");
            session_destroy();
            exit;
        }
    }

?>
