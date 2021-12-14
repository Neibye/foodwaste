<?php

// Indsætter foodlist i databasen. Er kommenteret ud, da den kun skal bruges en gang.

// include("mysql.php");
// $jsonFile = file_get_contents("../json/Food Database.json");
// $jsonArray = json_decode($jsonFile, true);

// $array = $jsonArray["data"];
// $maxArray = count($array);


// for ($i = 1; $i < $maxArray; $i++) {
//     $id = $array[$i]['Id'];
//     $group = $array[$i]['Group'];
//     $name = $array[$i]['Name'];
//     $kj = $array[$i]['Energy(kJ)'];
//     $kcal = $array[$i]['Energy(kcal)'];
//     $protein = $array[$i]['Protein'];
//     $fat = $array[$i]['Fat'];
//     $carb = $array[$i]['Carb'];
//     $fiber = $array[$i]['Fiber'];
//     $waste = $array[$i]['Waste'];

//     $sql = "INSERT INTO foodList (foodGroup, foodName, kj, kcal, protein, fat, carb, fiber, waste) 
//     VALUES ('$group', '$name', '$kj', '$kcal', '$protein', '$fat', '$carb', '$fiber', '$waste')"; 
//     $mySQL->query($sql);
// }

?>
