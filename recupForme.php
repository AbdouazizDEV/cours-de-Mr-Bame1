    <?php
/* ici on recupere les données du formulaire dans Fromulaire.php .Je presice qu'on utilise la methode pste*/


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$date_naissance = $_POST['naissance'];
$telephone = $_POST['telephone'];
$nationnalite = $_POST['nationnalite'];
$age = $_POST['age'];


/* Vérification des champs obligatoires */
if (!empty($nom) && !empty($prenom) && !empty($sexe) && !empty($date_naissance) && !empty($telephone) && !empty($age)) {
    
    // Gestion du téléchargement de fichier
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_size = $_FILES['photo']['size'];
        /* var_dump($photo_size);
        var_dump($photo_tmp);
        var_dump($photo_name); */
        // Vérification de la taille du fichier (3 Mo)
        if ($photo_size <= 3000000) {
            // Vérification du type de fichier
            $photo_type = mime_content_type($photo_tmp);
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
            /* var_dump($photo_type);
            var_dump($allowed_types); */
            if (in_array($photo_type, $allowed_types)) {
                // Générer un nom de fichier unique
                $unique_name = uniqid() . '_' . $photo_name;
                $destination = '/opt/lampp/htdocs/TPS/image/' . $unique_name;
                //var_dump($unique_name);
                // Déplacer le fichier uploadé
               /*  if (move_uploaded_file($photo_tmp, $destination)) {
                    var_dump($unique_name);
                    $upload_message = "Fichier téléchargé avec succès.";
                } else {
                    $upload_message = "Erreur lors du déplacement du fichier.";
                } */
                if (copy($photo_tmp, $destination)) {
                    $uploaded_files[] = $unique_name;
                    var_dump($uploaded_files);
                } else {
                    $upload_message = "Erreur lors du déplacement du fichier.";
                }
            } else {
                $upload_message = "Type de fichier non autorisé.";
            }
        } else {
            $upload_message = "La taille du fichier est trop grande.";
        }
    } else {
        $upload_message = "Erreur de téléchargement de fichier.";
    }
} else {
    $upload_message = "Veuillez remplir tous les champs.";
}
// Gestion des fichiers multiples
$uploaded_files = [];
if (isset($_FILES['photos']) && is_array($_FILES['photos']['error'])) {
    $photo_count = count($_FILES['photos']['error']);
    
    for ($i = 0; $i < $photo_count; $i++) {
        if ($_FILES['photos']['error'][$i] === UPLOAD_ERR_OK) {
            $photo_tmp = $_FILES['photos']['tmp_name'][$i];
            $photo_name = $_FILES['photos']['name'][$i];
            $photo_size = $_FILES['photos']['size'][$i];

            // Vérifications (taille, type, etc.) similaires à l'exemple précédent
            if ($photo_size <= 3000000) {
                $photo_type = mime_content_type($photo_tmp);
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];

                if (in_array($photo_type, $allowed_types)) {
                    $unique_name = uniqid() . '_' . $photo_name;
                    $destination = '/opt/lampp/htdocs/TPS/image/' . $unique_name;

                    if (move_uploaded_file($photo_tmp, $destination)) {
                        $uploaded_files[] = $unique_name;
                    }
                }
            }
        }
    }
}
/* on verifie la taille du fichier */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
    <style>
        .container {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 0 auto;
            width: 800px;   
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulaire</h2>
        <p>Nom : <?php echo $nom; ?></p>
        <p>Prenom : <?php echo $prenom; ?></p>
        <p>Sexe : <?php echo $sexe; ?></p>
        <p>Date de naissance : <?php echo $date_naissance; ?></p>
        <p>Nationnalite : <?php echo $nationnalite; ?></p>
        <p>Telephone : <?php echo $telephone; ?></p>
        <p>Age : <?php echo $age; ?></p>
        <p>Photo : <?php echo htmlspecialchars($photo_name); ?></p>
        <p>Taille de la photo : <?php echo htmlspecialchars($photo_size); ?> octets</p>

    </div>
    <hr>
    <div class="container">
        <!-- Autres informations du formulaire -->
        <h3>Photos téléchargées :</h3>
        <div class="uploaded-images">
            <?php 
            if (!empty($uploaded_files)) {
                foreach ($uploaded_files as $file) {
                    echo "<img src='/TPS/image/{$file}' alt='Image téléchargée' style='max-width: 200px; margin: 10px;'>";
                }
            } else {
                echo "Aucune photo téléchargée.";
            }
            ?>
        </div>
    </div>
</body>
</html>


