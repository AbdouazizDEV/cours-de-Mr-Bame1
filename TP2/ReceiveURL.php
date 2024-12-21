<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Receive URL</title>
</head>
<body>
    <h1>Page ReceiveURL</h1>
    <?php
    if(isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['sexe'])) {
        $nom = strtoupper($_GET['nom']);
        $prenom = htmlspecialchars($_GET['prenom']);
        $sexe = $_GET['sexe'];
        $salutation = ($sexe === 'M') ? 'Monsieur' : 'Madame';
        echo "<p>Bonjour $salutation $prenom $nom</p>";
    } else {
        echo "<p>Données incomplètes.</p>";
    }
    ?>
</body>
</html>
