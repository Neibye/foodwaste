<?php
  session_start();
  $loginMail = $_SESSION['post_loginMail'];
  $partnerName = $_SESSION['partnerName'];
  
?>
<?php
if($loginMail == null) {
  header("location: loginpage.php");
  session_destroy();
  exit;
} else {
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

<body onhashchange=>
  <!-- tabbar navigation -->
  <nav class="tabbar">
    <a class="nav-link" href="#/profile">
      <div><img src="img/profile.png" alt="plus image"></div>
      <div><p>Profil</p></div>
    </a>
    <a class="nav-link" href="#/products">
      <div><img src="img/home.png" alt="plus image"></div>
      <div><p>Home</p></div>
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
  <section id="products" class="page">
    <section class="tools-grid">
      <label for="outOfStock" class="checkmark-container">Show out of stock
        <input type="checkbox" id="outOfStock" onchange="showHideOfStock(this.checked)" checked>
        <span class="checkmark"></span>
      </label>
      <input type="search" placeholder="Search" onkeyup="search(this.value)" onsearch="search('')">
    </section>
    <section id="products-container" class="grid-container"></section>
  </section>

  <!-- create page --------------------------------------------------->
  <section id="add" class="page">
    
   <form class="addProductsForm col-pad" action="uploadProduct.php" method="post" enctype="multipart/form-data">
      
      <input type="text" id="produktNavn" name="produktNavn" placeholder="Navn på produkt"/>
      <input type="text" id="KategoriV" name="KategoriV" placeholder="Kategori"/>
      <input type="number" id="amount" name="amount" placeholder="Antal"/>
      <input type="date" id="datoForUdlob" name="datoForUdløb" placeholder="Udløbsdato"/>
      <input type="text" id="newPrice" name="newPrice" placeholder="Ny pris"/>
      
      <div class="flex">
      <input id="submitProduct" type="submit" onclick="" value="Opret Produkt" name="opretProdukt"/>
      </div>
      <!-- Onclick skal have tilføjet en funktion -->
    </form>
  </section>

  <!-- edit page ---------------------------------------------------->
  <section id="edit" class="page">
    <form>
      <input id="brandEdit" type="text" name="brand" placeholder="Brand">
      <input id="modelEdit" type="text" name="model" placeholder="Model">
      <input id="priceEdit" type="text" name="price" placeholder="Price">
      <input id="imgEdit" type="text" name="img" placeholder="Image URL">
      <button type="button" name="button" onclick="saveProduct()">Save</button>
    </form>
  </section>

  <!-- edit page -->
  

  <!-- Profile page ------------------------------------------------>
<section id="profile" class="page">
<div class="profilepage-content col-pad">
  <p>Skift kodeord</p>
  <form action="">
    <input placeholder="Nyt kodeord" type="password">
    <input placeholder="Gentag kodeord" type="password">
    <button id="changePasswordButton">Skift kodeord</button>
    <a id="logoutBtn" href="backend/backend.php?id=logout">Logout</a>
  </form>
  
</div>
    
  </section>

  
  <!-- loader  -->
  <section id="loader">
    <section class="spinner"></section>
  </section>


  <!-- SPA functionality  -->
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