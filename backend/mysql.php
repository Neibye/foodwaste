<?php
    $server = "127.0.0.1";
    $username = "root";
    $password = "3Xp75chr";
    $database = "foodwaste";

    // $server = "mysql39.unoeuro.com";
    // $username = "nicklaseibye_dk";
    // $password = "3Xp75chr";
    // $database = "nicklaseibye_dk_db_foodwaste";



    $mySQL = new mysqli($server, $username, $password, $database);

    if(!$mySQL) {
        die("Could not connect to the MySQL server: " . mysqli_connect_error());
    }


$selectUsers = "SELECT * FROM partners";
$result = mysqli_query($mySQL, $selectUsers);
$users = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

?>