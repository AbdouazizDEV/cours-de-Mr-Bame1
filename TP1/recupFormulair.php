<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des informations</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f5f6fa;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #4a90e2;
        }

        .info-section {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .info-item {
            display: flex;
            margin-bottom: 10px;
            padding: 10px;
            background-color: white;
            border-radius: 5px;
        }

        .info-label {
            font-weight: bold;
            min-width: 200px;
            color: #4a90e2;
        }

        .info-value {
            flex: 1;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.9em;
            font-weight: 500;
        }

        .status-vente {
            background-color: #2ecc71;
            color: white;
        }

        .status-location {
            background-color: #3498db;
            color: white;
        }

        .promo-oui {
            background-color: #e74c3c;
            color: white;
        }

        .promo-non {
            background-color: #95a5a6;
            color: white;
        }

        .description-section {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .retour-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .retour-btn:hover {
            background-color: #357abd;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $code = htmlspecialchars($_POST['code']);
        $marque = htmlspecialchars($_POST['marque']);
        $modele = htmlspecialchars($_POST['modele']);
        $categorie = htmlspecialchars($_POST['categorie']);
        $quantite_unitaire = htmlspecialchars($_POST['quantite_unitaire']);
        $quantite_disponible = htmlspecialchars($_POST['quantite_disponible']);
        $date_achat = htmlspecialchars($_POST['date_achat']);
        $option = isset($_POST['option']) ? htmlspecialchars($_POST['option']) : '';
        $option_promo = isset($_POST['option_promo']) ? htmlspecialchars($_POST['option_promo']) : '';
        $description = htmlspecialchars($_POST['description']);

        echo '<div class="container">';
        echo '<h1>Récapitulatif des informations</h1>';

        echo '<div class="info-section">';
        echo '<div class="info-item"><span class="info-label">Code :</span><span class="info-value">' . $code . '</span></div>';
        echo '<div class="info-item"><span class="info-label">Marque :</span><span class="info-value">' . $marque . '</span></div>';
        echo '<div class="info-item"><span class="info-label">Modèle :</span><span class="info-value">' . $modele . '</span></div>';
        echo '<div class="info-item"><span class="info-label">Catégorie :</span><span class="info-value">' . $categorie . '</span></div>';
        echo '<div class="info-item"><span class="info-label">Quantité unitaire :</span><span class="info-value">' . $quantite_unitaire . '</span></div>';
        echo '<div class="info-item"><span class="info-label">Quantité disponible :</span><span class="info-value">' . $quantite_disponible . '</span></div>';
        echo '<div class="info-item"><span class="info-label">Date d\'achat :</span><span class="info-value">' . date('d/m/Y', strtotime($date_achat)) . '</span></div>';
        echo '<div class="info-item"><span class="info-label">Option :</span><span class="info-value"><span class="status status-' . strtolower($option) . '">' . $option . '</span></span></div>';
        echo '<div class="info-item"><span class="info-label">En promotion :</span><span class="info-value"><span class="status promo-' . strtolower($option_promo) . '">' . $option_promo . '</span></span></div>';
        
        echo '<div class="description-section">';
        echo '<div class="info-label">Description :</div>';
        echo '<div class="info-value">' . nl2br($description) . '</div>';
        echo '</div>';
        echo '</div>';

        echo '<a href="javascript:history.back()" class="retour-btn">Retour au formulaire</a>';
        echo '</div>';
    } else {
        echo '<div class="container">';
        echo '<h1>Erreur</h1>';
        echo '<p>Aucune donnée n\'a été soumise.</p>';
        echo '<a href="javascript:history.back()" class="retour-btn">Retour au formulaire</a>';
        echo '</div>';
    }
    ?>
</body>
</html>