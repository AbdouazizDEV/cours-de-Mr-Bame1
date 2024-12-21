<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Send URL</title>
</head>
<body>
    <h1>Page SendURL</h1>
    <p>Cliquez sur le lien pour envoyer des données à ReceiveURL.php</p>
    <a href="ReceiveURL.php?nom=Ndiaye&prenom=Djiby&sexe=M">Envoyer des données de Monsieur</a><br>
    <!-- <a href="ReceiveURL.php?nom=Sarr&prenom=Seynabou&sexe=F">Envoyer des données de Madame</a><br> -->
    <a href="SendURL.php?nom=Gaye&prenom=Saly&sexe=F">Tester l'affichage sur cette page</a>

    <?php
        if(isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['sexe'])) {
            $nom = strtoupper($_GET['nom']);
            $prenom = htmlspecialchars($_GET['prenom']);
            $sexe = $_GET['sexe'];
            $salutation = ($sexe === 'M') ? 'Monsieur' : 'Madame';
            echo "<p>Bonjour $salutation $prenom $nom</p>";
        }
    ?>

</body>
</html>
