<?php
  session_start();
  $loginMail = $_SESSION['post_loginMail'];
  
?>
<?php
if($loginMail != null && $loginPassword != null) {
  header("location: match.php");
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
      <div><img src="img/products.png" alt="plus image"></div>
      <div><p>Home</p></div>
    </a>
    <a class="nav-link" href="#/add">
      <div><img src="img/plus.png" alt="plus image"></div>
      <div><p>Tilføj vare</p></div>
    </a>
  </nav>

  <!-- pages -->
  <!-- home page -->
  <section id="products" class="page">
    <header class="topbar">
      <h2><?php echo $loginMail ?></h2>
    </header>
    <section class="tools-grid">
      <label for="sortBy">Order by:
        <select id="sortBy" onchange="orderBy(this.value)">
          <option value="" selected disabled>Choose here</option>
          <option value="brand">Brand</option>
          <option value="model">Model</option>
          <option value="price">Price</option>
        </select>
      </label>
      <label for="outOfStock" class="checkmark-container">Show out of stock
        <input type="checkbox" id="outOfStock" onchange="showHideOfStock(this.checked)" checked>
        <span class="checkmark"></span>
      </label>
      <input type="search" placeholder="Search" onkeyup="search(this.value)" onsearch="search('')">
    </section>
    <section id="products-container" class="grid-container"></section>
  </section>

  <!-- create page -->
  <section id="add" class="page">
    <header class="topbar">
      <h2>Add New Product</h2>
    </header>
    <form>
      <input id="brand" type="text" name="brand" placeholder="Brand">
      <input id="model" type="text" name="model" placeholder="Model">
      <input id="price" type="text" name="price" placeholder="Price">
      <input id="img" type="text" name="img" placeholder="Image URL">
      <button type="button" name="button" onclick="addNewProduct()">Save</button>
    </form>
  </section>

  <!-- edit page -->
  <section id="edit" class="page">
    <header class="topbar">
      <a class="left" class="nav-link" href="#/products">Back</a>
      <h2>Edit Product</h2>
    </header>
    <form>
      <input id="brandEdit" type="text" name="brand" placeholder="Brand">
      <input id="modelEdit" type="text" name="model" placeholder="Model">
      <input id="priceEdit" type="text" name="price" placeholder="Price">
      <input id="imgEdit" type="text" name="img" placeholder="Image URL">
      <button type="button" name="button" onclick="saveProduct()">Save</button>
    </form>
  </section>

  <!-- edit page -->
  <section id="detail-view" class="page">
    <header class="topbar">
      <a class="left" class="nav-link" href="#/products">Back</a>
      <h2 class="title">Product</h2>
    </header>
    <section id="detail-view-container"></section>
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
}
?>

  
<?php
/*}
  else {
    header("location: index.php");
    exit;
}*/
session_destroy();
?>
</html>