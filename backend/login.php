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
        
    $partnerLogin = "SELECT mail, partnerPassword, id FROM partnerLogin";

        
    $loginMail = $_POST['loginMail'];
    $loginPassword = $_POST['loginPassword'];

    $partnerLoginId = "SELECT id FROM partnerLogin WHERE mail = $loginMail";

        
    $_SESSION['post_loginMail'] = strtolower($loginMail);
    /*if(isset($_POST)) {
            $partnerLoginResult = $mySQL->query($partnerLogin)->fetch_object();
            $hashkey = $partnerLoginResult->partnerPassword;
            $passVerify = password_verify($loginPassword, $hashkey);
        if ($passVerify) {
            $_SESSION['partnerId'] = $partnerLoginResult->id;
            //$partnerLoginIdResult = $mySQL->query($partnerLoginId)->fetch_object();
            $partnerLoginId = $partnerLoginResult->id;
            $_SESSION['partnerLoginIdSession'] = $partnerLoginId;
            header("location: ../index.php");
            exit;
        } else {
            header("location: ../loginpage.php?login=failed");
            session_destroy();
            exit;
        }
    }*/
    if(isset($_POST)) {
        $partnerLoginResult = $mySQL->query($partnerLogin)->fetch_object();
        var_dump($partnerLoginResult);
        $hashkey = $partnerLoginResult->partnerPassword;
        $passVerify = password_verify($loginPassword, $hashkey);
        if ($passVerify && $partnerLoginResult->mail = $loginMail) {
            $_SESSION['userId'] = $partnerLoginResult->id;
            echo $partnerLoginResult->id;
            echo $partnerLoginResult->mail;
            echo $loginMail;
            header("location: ../index.php");
            exit;
        } else {
            header("location: ../loginpage.php?login=failed");
            session_destroy();
            exit;
        }
    }
?>
