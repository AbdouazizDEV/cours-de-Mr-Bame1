<?php
// Fonction pour nettoyer les entrées
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Création du dossier MesPhotos s'il n'existe pas
if (!file_exists('MesPhotos')) {
    mkdir('MesPhotos', 0777, true);
}

// Traitement de la photo
$photoMessage = "";
$photoPath = "";
if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $filename = $_FILES['photo']['name'];
    $filetype = $_FILES['photo']['type'];
    $filesize = $_FILES['photo']['size'];

    // Vérifier l'extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)) {
        $photoMessage = "Erreur : Veuillez sélectionner un format de fichier valide.";
    }

    // Vérifier la taille (5MB maximum)
    $maxsize = 5 * 1024 * 1024;
    if($filesize > $maxsize) {
        $photoMessage = "Erreur : La taille du fichier est supérieure à la limite autorisée.";
    }

    // Vérifier le type MIME
    if(in_array($filetype, $allowed)) {
        // Vérifier s'il existe déjà un fichier avec ce nom
        $newFileName = time() . '_' . $filename; // Ajoute un timestamp pour rendre le nom unique
        $photoPath = "MesPhotos/" . $newFileName;
        
        if(move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
            $photoMessage = "La photo a été uploadée avec succès.";
        } else {
            $photoMessage = "Erreur lors de l'upload de la photo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement de l'inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1 {
            color: #2196F3;
            text-align: center;
            margin-bottom: 30px;
        }

        .section {
            margin-bottom: 30px;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
        }

        .section-title {
            background-color: #2196F3;
            color: white;
            padding: 8px 15px;
            margin: -15px -15px 15px -15px;
            border-radius: 4px 4px 0 0;
        }

        .photo-container {
            text-align: center;
            margin: 20px 0;
        }

        .photo-container img {
            max-width: 200px;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .info-row {
            display: flex;
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: bold;
            width: 200px;
            color: #666;
        }

        .info-value {
            flex: 1;
        }

        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .success {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .error {
            background-color: #ffebee;
            color: #c62828;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Récapitulatif de l'inscription</h1>

        <?php if(!empty($photoMessage)): ?>
            <div class="message <?php echo strpos($photoMessage, 'Erreur') === 0 ? 'error' : 'success'; ?>">
                <?php echo $photoMessage; ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($photoPath)): ?>
            <div class="photo-container">
                <img src="<?php echo $photoPath; ?>" alt="Photo de profil">
            </div>
        <?php endif; ?>

        <!-- État Civil -->
        <div class="section">
            <div class="section-title">État Civil</div>
            <div class="info-row">
                <div class="info-label">Nom :</div>
                <div class="info-value"><?php echo isset($_POST['nom']) ? cleanInput($_POST['nom']) : ''; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Prénoms :</div>
                <div class="info-value">
                    <?php 
                    $prenoms = array();
                    for($i = 1; $i <= 3; $i++) {
                        if(isset($_POST['prenom'.$i]) && !empty($_POST['prenom'.$i])) {
                            $prenoms[] = cleanInput($_POST['prenom'.$i]);
                        }
                    }
                    echo implode(', ', $prenoms);
                    ?>
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Date de naissance :</div>
                <div class="info-value"><?php echo isset($_POST['date_naissance']) ? cleanInput($_POST['date_naissance']) : ''; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Lieu de naissance :</div>
                <div class="info-value"><?php echo isset($_POST['lieu_naissance']) ? cleanInput($_POST['lieu_naissance']) : ''; ?></div>
            </div>
        </div>

        <!-- Adresse -->
        <div class="section">
            <div class="section-title">Adresse</div>
            <div class="info-row">
                <div class="info-label">Adresse à Dakar :</div>
                <div class="info-value"><?php echo isset($_POST['adresse_dakar']) ? cleanInput($_POST['adresse_dakar']) : ''; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Téléphone :</div>
                <div class="info-value"><?php echo isset($_POST['telephone']) ? cleanInput($_POST['telephone']) : ''; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Email :</div>
                <div class="info-value"><?php echo isset($_POST['email']) ? cleanInput($_POST['email']) : ''; ?></div>
            </div>
        </div>

        <!-- Situation Professionnelle -->
        <div class="section">
            <div class="section-title">Situation Professionnelle</div>
            <div class="info-row">
                <div class="info-label">Activité salariée :</div>
                <div class="info-value"><?php echo isset($_POST['activite_salariee']) ? cleanInput($_POST['activite_salariee']) : 'Non'; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Catégorie :</div>
                <div class="info-value"><?php echo isset($_POST['categorie_sociopro']) ? cleanInput($_POST['categorie_sociopro']) : ''; ?></div>
            </div>
        </div>

        <!-- Inscription -->
        <div class="section">
            <div class="section-title">Inscription</div>
            <div class="info-row">
                <div class="info-label">Année d'étude :</div>
                <div class="info-value"><?php echo isset($_POST['annee_etude']) ? cleanInput($_POST['annee_etude']) : ''; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Département :</div>
                <div class="info-value"><?php echo isset($_POST['departement']) ? cleanInput($_POST['departement']) : ''; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Option :</div>
                <div class="info-value"><?php echo isset($_POST['option']) ? cleanInput($_POST['option']) : ''; ?></div>
            </div>
        </div>
    </div>
</body>
</html>