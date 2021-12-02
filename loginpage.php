<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="form flex alignCenter spaceAround">
    <form action="backend/login.php" method="post">
    <h2>Login</h2>
    Mail:<br>
    <input type="text" name="loginMail" required><br><br>
    Password:<br>
    <input type="password" minlength="8" name="loginPassword" required><br><br>
    <input type="submit" value="Login">
    <p>Not a user? <a href="registration.php">Register here</a></p> 
    </form>
</div>
</body>
</html>