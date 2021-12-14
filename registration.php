<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Registrer</title>
</head>
<body>
<div class="form flex alignCenter spaceAround">
<form action="backend/create.php" method="post">
    <input type="hidden" name="action" value="create">
    <h2>Create user</h2>
        Navn på partner: <br>
        <input type="text" name="name" required><br><br>

        By: <br>
        <input type="text" name="by" required><br><br>

        Postnr: <br>
        <input type="text" name="postnr" required><br><br>
  
        Mail: <br>
        <input type="text" name="mail" required><br><br>
 
        Password: <br>
        <input type="password" minlength="6" name="password" required><br><br>
 
        <input type="submit" value="Create user">
        <p>Allready a user? <a href="index.php">Login here</a></p> 
    </form>
</div>
</body>
</html>