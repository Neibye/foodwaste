<!-- session_start();
  $loginMail = $_SESSION['post_loginMail'];
  $partnerName = $_SESSION['partnerName'];
  $partnerId = $_SESSION['partnerId'];
  $allFoodGroups = $_SESSION['allFoodGroups'];

  $foodGroupsLength = count($allFoodGroups);
  
if($loginMail == null) {
  header("location: loginpage.php");
  session_destroy();
  exit;
} else { -->
  
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
  <link rel="stylesheet" href="css/bruger.css">
  <link rel="shortcut icon" type="image/svg" href="img/fineFood.svg" />
</head>

<body onload="initApp()" onhashchange=>
  <!-- tabbar navigation -->
  <nav class="tabbar">
  <a class="nav-link" href="#/products">
      <div><img src="img/products.png" alt="products"></div>
      <div><p>Udvalg</p></div>
    </a>
    <a class="nav-link" href="#/score">
      <div><img src="img/podium.png" alt="podium"></div>
      <div><p>Score</p></div>
    </a>
    <a class="nav-link" href="#/profile">
      <div><img src="img/profile.png" alt="profile picture"></div>
      <div><p>Profil</p></div>
    </a>
  </nav>

  <!------------------------------------------------ pages ------------------------------------------------>

  <!-- Udvalg page------------------------------------------------------>
  <header class="topbar">
      <img src="img/fineFood.svg" alt="fineFood logo">
    </header>
    
  <section id="products" class="page col-pad">

    <h2 id="postnummer">Indtast Postnummer eller butik</h2>
  
    <div id="flexPlaceQues">
    <input id="postplaceholder" type="search" placeholder="Eks. 8000 / Føtex Frederiks Alle" onkeyup="search(this.value)" onsearch="search('')">
    <img id="question" src="img/question.png" alt="question mark">
  </div>

<div id="menupunkter">
  <button class="topBtn">Brød</button>
  <button class="topBtn">Frugt</button>
  <button class="topBtn">Kød</button>
  <button class="topBtn">Andet</button>
</div>
<div id="product-grid">
    
</div>
  </section> 

  <!-- score page --------------------------------------------------->
  <section id="score" class="page col-pad">
  
  <h2>HighScore</h2>
  
  <h3 class="overbokstext">Din besparelse</h3>
  <div class="scoreBox">
      <div class="flex spaceBtwn smMargin alignCenter"><p>Fuld pris:</p><p class="score">582 kr</p></div>
      <div class="flex spaceBtwn nmMargin alignCenter"><p>Din Pris:</p><p>309 kr</p></div>
      <div class="flex spaceBtwn alignCenter"><p>Du har i alt sparet:</p><p class="greenprice">273 kr</p></div>
  </div>

  <h3 class="overbokstext">Dine præmier</h3>
  <div class="scoreBox flex alignCenter spaceBtwn">
    <div class="scoreBoxContent">
      <p class="smMargin">Tillykke! Du har opnået en bronze medalje denne måned.</p>
      <p class="secondaryText">Køb for 27 kroner mere for at opnå en sølvmedalje</p>
    </div>
    <div class="medalBox">
      <img id="" class="medals fade" src="img/gold-medal.png" alt="gold medal">
      <img id="" class="medals fade" src="img/silver-medal.png" alt="silver medal">
      <img class="medals" src="img/bronze-medal.png" alt="bronze medal">
    </div>
  </div>

  <h3 class="overbokstext">Brug din præmie</h3>
  <div class="scoreBox">
      <p id="lastinfobox">Du kan nu spare <span class="greenTxt">10 kr</span> på dit næste køb hos en af de mange
        dagligvarer butikker</p>
    </div>
  </div>


  </section>

  <!-- Profile page ------------------------------------------------>

<section id="profile" class="page">
<div class="profilepage-content col-pad">
  <p id="skiftkodeord">Skift kodeord</p>
  <form action="backend/changePassword.php" method="post">
    <input name="nytKodeord" placeholder="Nyt kodeord" type="password">
    <input name="gentagKodeord" placeholder="Gentag kodeord" type="password">
    <input class="submitBtn" id="changePasswordButton" type="submit" value="Skift kodeord" placeholder="Skift kodeord">
    <a id="logoutBtn" href="backend/backend.php?id=logout">Logout</a>
  </form>
  <img class="profileImg" src="img/fineFood.svg" alt="Logo fineFood">
</div>
</section>

  <!-- SPA functionality  -->
  <script src="js/router.js"></script>
  <!-- main js file -->
  <script src="js/app.js"></script>

</body>
</html>