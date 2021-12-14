<?php
    // Connection to database (informations)
    $server = "127.0.0.1";
    $username = "root";
    $password = "3Xp75chr";
    $database = "foodwaste";

    $mySQL = new mysqli($server, $username, $password, $database);

    // Hvis ikke true, så giver den fejl besked
    if(!$mySQL) {
        die("Could not connect to the MySQL server: " . mysqli_connect_error());
    }
?>