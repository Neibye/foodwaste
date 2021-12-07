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
    <input type="search" placeholder="Search" onkeyup="search(this.value)" onsearch="search('')">
  <section id="products" class="page col-pad">
    <section class="tools-grid">
       <div class="container">
         <div class="nameBox"><p>Arla letmælk</p><p>5kr</p></div>
         <div class="editBox">Rediger</div>
         <div class="deleteBox">Fjern</div>
    </div>
    </section>
   
    
  </section>

  <!-- create page --------------------------------------------------->
  <section id="add" class="page">
    
   <form class="addProductsForm col-pad" action="uploadProduct.php" method="post" enctype="multipart/form-data">
      
      <input type="text" id="produktNavn" name="produktNavn" placeholder="Navn på produkt"/>
      <input type="text" id="KategoriV" name="KategoriV" placeholder="Kategori"/>
      <input type="number" id="amount" name="amount" placeholder="Antal"/>
      <div class="udlob">
      <label for="datoForUdlob">Udløbsdato</label>
      <input type="date" id="datoForUdlob" name="datoForUdlob" placeholder="Udløbsdato"/>
      </div>
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
  <form action="backend/changePassword.php" method="post">
    <input name="nytKodeord" placeholder="Nyt kodeord" type="password">
    <input name="gentagKodeord" placeholder="Gentag kodeord" type="password">
    <input class="submitBtn" id="changePasswordButton" type="submit" value="Skift kodeord" placeholder="Skift kodeord">
    <a id="logoutBtn" href="backend/backend.php?id=logout">Logout</a>
  </form>
  <img class="profileImg" src="img/fineFood.svg" alt="Logo fineFood">
</div>
    
  </section>

  
  <!-- loader  -->
  <!-- <section id="loader">
    <section class="spinner"></section>
  </section> -->


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