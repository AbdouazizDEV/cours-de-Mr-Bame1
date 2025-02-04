<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Voitures</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            background-color: #f5f6fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #f1f2f6;
        }

        img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 4px;
        }

        .status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.9em;
            font-weight: 500;
            text-align: center;
            display: inline-block;
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

        .retour-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .retour-btn:hover {
            background-color: #2980b9;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des Voitures Disponibles</h1>
        
        <?php
        try {
            // Charger les variables d'environnement
            $env = parse_ini_file('../.env');
            if ($env === false) {
                throw new Exception("Impossible de charger le fichier .env");
            }

            // Connexion à la base de données
            $pdo = new PDO(
                "mysql:host=" . $env['DB_HOST'] . ";dbname=" . $env['DB_NAME'] . ";charset=utf8",
                $env['DB_USER'],
                $env['DB_PASS'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

            // Récupération des voitures
            $sql = "SELECT * FROM voiture ORDER BY date_creation DESC";
            $stmt = $pdo->query($sql);
            $voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($voitures) > 0) {
                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Photo</th>';
                echo '<th>Code</th>';
                echo '<th>Marque</th>';
                echo '<th>Modèle</th>';
                echo '<th>Catégorie</th>';
                echo '<th>Prix Unitaire</th>';
                echo '<th>Disponible</th>';
                echo '<th>Option</th>';
                echo '<th>Promo</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($voitures as $voiture) {
                    echo '<tr>';
                    echo '<td><img src="' . htmlspecialchars($voiture['photo']) . '" alt="' . htmlspecialchars($voiture['marque'] . ' ' . $voiture['modele']) . '"></td>';
                    echo '<td>' . htmlspecialchars($voiture['code']) . '</td>';
                    echo '<td>' . htmlspecialchars($voiture['marque']) . '</td>';
                    echo '<td>' . htmlspecialchars($voiture['modele']) . '</td>';
                    echo '<td>' . htmlspecialchars($voiture['categorie']) . '</td>';
                    echo '<td>' . htmlspecialchars($voiture['quantite_unitaire']) . '</td>';
                    echo '<td>' . htmlspecialchars($voiture['quantite_disponible']) . '</td>';
                    echo '<td><span class="status status-' . strtolower($voiture['option_vente']) . '">' . htmlspecialchars($voiture['option_vente']) . '</span></td>';
                    echo '<td><span class="status promo-' . strtolower($voiture['en_promo']) . '">' . htmlspecialchars($voiture['en_promo']) . '</span></td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>Aucune voiture n\'est enregistrée pour le moment.</p>';
            }

        } catch (Exception $e) {
            echo '<div class="alert alert-danger">Une erreur est survenue : ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
        ?>

        <a href="javascript:history.back()" class="retour-btn">Retour au formulaire</a>;

    </div>
</body>
</html>