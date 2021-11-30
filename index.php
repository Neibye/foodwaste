<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>User CRUD SPA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Get started with HTML, CSS and JavaScript">
  <meta name="author" content="Rasmus Cederdorff">
  <link rel="stylesheet" href="css/main.css">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
</head>

<body>
  <!-- tabbar navigation -->
  <nav class="tabbar">
    <a href="#/" class="nav-link">Users</a>
    <a href="#/create" class="nav-link">Create</a>
  </nav>

  <!-- pages -->
  <!-- users page -->
  <section id="users" class="page">
    <header class="topbar">
      <h2>Users</h2>
      <a href="#/create" class="nav-link right">Create</a>
    </header>
    <div id="grid-users" class="grid-container"></div>
  </section>
<!-- ekstra kommentar - slet gerne igen -->
  <!-- create user page -->
  <section id="create" class="page">
    <header class="topbar">
      <a href="#/" class="nav-link left">Back</a>
      <h2>Create user</h2>
      <a class="right" onclick="createUser()">Save</a>
    </header>
    <form>
      <input type="text" id="name" placeholder="Type your name" required>
      <input type="email" id="mail" placeholder="Type your mail" required>
      <button type="button" name="button" onclick="createUser()">Create User</button>
    </form>
  </section>

  <!-- edir user page -->
  <section id="update" class="page">
    <header class="topbar">
      <a href="#/" class="nav-link left">Back</a>
      <h2>Update user</h2>
      <a class="right" onclick="updateUser()">Update</a>
    </header>
    <form>
      <input type="text" id="name-update" placeholder="Type your name" required>
      <input type="email" id="mail-update" placeholder="Type your mail" required>
      <button type="button" name="button" onclick="updateUser()">Update User</button>
    </form>
  </section>

  <!-- loader  -->
  <div id="loader">
    <div class="spinner"></div>
  </div>

  <!-- Router functionality  -->
  <script src="js/router.js"></script>
  <!-- main js file -->
  <script src="js/main.js"></script>
</body>

</html>