<!-- index.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'Authentification</title>
    <link rel="stylesheet" href="./style/StyleLogin.css">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Login to your Account</h2>
            <form action="verifAuthent.php" method="POST">
                <div>
                    <input type="text" id="login" name="login" placeholder="Email" required>
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <button type="submit">LOGIN</button>
                </div>
                <p><a href="#">Forget Password?</a></p>
            </form>
        </div>
        <div class="login-info">
            <h2>Logo</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <button onclick="window.location.href='#';">Register</button>
        </div>
    </div>
</body>
</html>
