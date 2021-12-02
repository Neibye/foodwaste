<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/loginpage.css">
    <link rel="shortcut icon" type="image/svg" href="img/fineFood.svg" />
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