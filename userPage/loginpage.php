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
    <div class="loginpage">
        <div class="loginpageContent">
            <img class="loginpageLogo" src="img/fineFood.svg" alt="Logo fineFood">
            <div class="form flex alignCenter spaceAround">
                <form class="col-pad" action="backend/login.php" method="post">
                    <h1>Login på fineFood</h1>
                    <input type="text" name="loginMail" required placeholder="E-mail">
                    <input type="password" minlength="8" name="loginPassword" required placeholder="Password">
                    <input class="submitBtn" type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>