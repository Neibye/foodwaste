<?php
session_start();
include("mysql.php");



if ($_GET['id'] == "logout") {
    session_destroy();
    header("location: ../loginpage.php");
    exit;
}




// $foodGroupsResults = mysqli_query($mySQL, $foodGroupsSQL);
// echo $foodGroupsResults[1];

// $foodGroups = array();
// if ($foodGroupsResults->num_rows) > 0) {
//     while($row = mysqli_fetch_assoc($result)) {
//         $foodGroups[] = $row;
//     }
// }
// var_dump($foodGroups);

// $sql = "SELECT id FROM foodList WHERE foodName LIKE ('%$searchInput%')";

//             // Get all the results and save them in an array
//             $result = $this->mySQL->query($sql);
//             while($row = $result->fetch_assoc()) {
//                 // Checking for duplicates. Do NOT add the result if it's already in the array
//                 if(!in_array($row['id'], $allResults)) {
//                     $allResults[] = $row['id'];
//                 }
//             }

// $foodGroupsMax = $mySQL->query($foodGroupsSQL);

// $foodGroupLength = $foodGroupsMax->num_rows;

// var_dump($foodGroups);


// for ($i=0; $i < $foodGroupLength; $i++) { 
    
//     $foodGroup = $mySQL->query($foodGroupsSQL)->fetch_object();
//     echo $foodGroup;
// }

// $_SESSION['foodGroups'] = $foodGroups;
// var_dump($foodGroupLength);



// $selectFood = "SELECT * FROM food";
// $result = mysqli_query($mySQL, $selectFood);
// $food = array();
// if (mysqli_num_rows($result) > 0) {
//     while($row = mysqli_fetch_assoc($result)) {
//         $food[] = $row;
//     }
// }

?>