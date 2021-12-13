<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Opret bruger</title>
</head>
<body>
    <div class="loginpage">
        <div class="loginpageContent">
            <img class="loginpageLogo" src="img/fineFood.svg" alt="Logo fineFood">
            <div class="form flex alignCenter spaceAround">
                <form action="backend/create.php" method="post">    
                    <input type="hidden" name="action" value="create">
                        <h2>Opret bruger</h2>
                        <input type="text" name="navn" required placeholder="Navn"><br><br>
                        <input type="text" name="by" required placeholder="By"><br><br>
                        <input type="text" name="postnr" required placeholder="Postnr"><br><br>
                        <input type="text" name="tlfNr" required placeholder="Telefon nummer"><br><br>
                        <input type="text" name="mail" required placeholder="Mail"><br><br>
                        <input type="password" name="userPassword" required placeholder="Kodeord"><br><br>
                        <input type="submit" value="Create user">
                        <p>Har du allerede en bruger? <a href="index.php">Login her</a></p> 
                </form>
            </div>
        </div>
    </div>
<div class="form flex alignCenter spaceAround">
    
</div>
</body>
</html>