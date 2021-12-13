<?php
  session_start();
  $loginMail = $_SESSION['post_loginMail'];
  $partnerName = $_SESSION['partnerName'];
  $partnerId = $_SESSION['partnerId'];
  $allFoodGroups = $_SESSION['allFoodGroups'];

  
  
if($loginMail == null) {
  header("location: loginpage.php");
  session_destroy();
  exit;
} else {
  $foodGroupsLength = count($allFoodGroups);
  ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>FineFood</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="FineFood foodwaste app">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="shortcut icon" type="image/svg" href="img/fineFood.svg" />
</head>

<body onload="initApp(<?php echo $partnerId ?>)" onhashchange=>
  <!-- tabbar navigation -->
  <nav class="tabbar">
    <a class="nav-link" href="#/profile">
      <div><img src="img/profile.png" alt="plus image"></div>
      <div><p>Profil</p></div>
    </a>
    <a class="nav-link" href="#/products">
      <div><img src="img/home.png" alt="plus image"></div>
      <div><p>Hjem</p></div>
    </a>
    <a class="nav-link" href="#/add">
      <div><img src="img/plus.png" alt="plus image"></div>
      <div><p>Tilføj vare</p></div>
    </a>
  </nav>

  <!-- pages --------------------------------------------------------->
  <!-- home page------------------------------------------------------>
  <header class="topbar">
      <h1><?php echo $partnerName ?></h1>
    </header>
    
  <section id="products" class="page col-pad">
  <input type="search" placeholder="Search" onkeyup="search(this.value)" onsearch="search('')">
    <div id="product-grid">

    </div>
  </section>

  <!-- create page --------------------------------------------------->
  <section id="add" class="page col-pad">
    <h2>Opret produkt</h2>
   <form class="addProductsForm" action="backend/uploadProduct.php" method="post">
      
      <input type="text" id="produktNavn" name="produktNavn" placeholder="Navn på produkt"/>
      <select name="produktKategori" id="kategori">
        <?php 
        for ($i=0; $i < $foodGroupsLength; $i++) {
        ?>
          <option value="" disabled selected hidden>Kategori</option>
          <option value="<?php echo $allFoodGroups[$i]["foodGroup"] ?>"> <?php echo $allFoodGroups[$i]["foodGroup"] ?> </option>
        <?php
        }
        
        ?>
      </select>
      <input type="number" id="antal" name="antal" placeholder="Antal"/>
      <div class="udlob">
      <label for="datoForUdlob">Udløbsdato</label>
      <input type="date" id="datoForUdlob" name="datoForUdlob" placeholder="Udløbsdato"/>
      </div>
      <input type="text" id="oldPrice" name="oldPrice" placeholder="Gammel pris"/>
      <input type="text" id="newPrice" name="newPrice" placeholder="Ny pris"/>
      <div class="flex">
      <input id="submitProduct" type="submit" onclick="" value="Opret Produkt" name="opretProdukt"/>
      </div>
      <!-- Onclick skal have tilføjet en funktion -->
    </form>
  </section>

  <!-- edit page ---------------------------------------------------->
  <section id="edit" class="page col-pad">
    <h2>Opdater produkt</h2>
    <form class="updateForm" method="post" action="">
      <input type="text" id="produktNavnEdit" name="produktNavnEdit" placeholder="Navn på produkt"/>
      <select name="produktKategoriEdit" id="kategoriEdit">
        <?php 
        for ($i=0; $i < $foodGroupsLength; $i++) {
        ?>
          <option value="" disabled selected hidden>Kategori</option>
          <option value="<?php echo $allFoodGroups[$i]["foodGroup"] ?>"> <?php echo $allFoodGroups[$i]["foodGroup"] ?> </option>
        <?php
        }
        
        ?>
      </select>
      <input type="number" id="antalEdit" name="antalEdit" placeholder="Antal"/>
      <div class="udlob">
        <label for="datoForUdlobEdit">Udløbsdato</label>
        <input type="date" id="datoForUdlobEdit" name="datoForUdlobEdit" placeholder="Udløbsdato"/>
      </div>
      <input type="text" id="oldPriceEdit" name="oldPriceEdit" placeholder="Gammel pris"/>
      <input type="text" id="newPriceEdit" name="newPriceEdit" placeholder="Ny pris"/>
      <div class="flex">
        <input id="opdaterProductEdit" type="submit" value="Opdater produkt" name="opdaterProdukt"/>
      </div>
    </form>
  </section>

  <!-- Profile page ------------------------------------------------>
<section id="profile" class="page">
  <div class="profilepage-content col-pad">
    <h2>Skift kodeord</h2>
    <form action="backend/changePassword.php" method="post">
      <input name="nytKodeord" placeholder="Nyt kodeord" type="password">
      <input name="gentagKodeord" placeholder="Gentag kodeord" type="password">
      <input class="submitBtn" id="changePasswordButton" type="submit" value="Skift kodeord" placeholder="Skift kodeord">
      <a id="logoutBtn" href="backend/backend.php?id=logout">Logout</a>
    </form>
    <img class="profileImg" src="img/fineFood.svg" alt="Logo fineFood">
  </div>
</section>

  <!-- SPA -->
  <script src="js/router.js"></script>
  <!-- main js file -->
  <script src="js/app.js"></script>
</body>
<?php
//}
?>

  
<?php
}
?>
</html>