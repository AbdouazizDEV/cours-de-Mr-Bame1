<?php
// Création du dossier pour les images s'il n'existe pas
$uploadDir = __DIR__ . '/imagesOffres/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Traitement des images
$uploadedImages = [];
$errors = [];

if(isset($_FILES['photos'])) {
    foreach($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
        if($_FILES['photos']['error'][$key] === UPLOAD_ERR_OK) {
            $filename = $_FILES['photos']['name'][$key];
            $tmpName = $_FILES['photos']['tmp_name'][$key];
            
            // Vérification du type de fichier
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $fileType = mime_content_type($tmpName);
            
            if(!in_array($fileType, $allowedTypes)) {
                $errors[] = "Le fichier $filename n'est pas une image valide.";
                continue;
            }
            
            // Génération d'un nom unique
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newFilename = uniqid() . '_' . time() . '.' . $extension;
            $destination = $uploadDir . $newFilename;
            
            if(move_uploaded_file($tmpName, $destination)) {
                $uploadedImages[] = $newFilename;
            } else {
                $errors[] = "Erreur lors du téléchargement de $filename";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'offre</title>
    <style>
        /* Styles de base similaires à AjoutOffre.php */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* Styles du carrousel */
        .carousel {
        position: relative;
        margin-bottom: 20px;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
        }

        .main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            transition: opacity 0.3s ease;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            border-radius: 50%;
            font-size: 18px;
            transition: background-color 0.3s ease;
            z-index: 10;
        }

        .carousel-button:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .carousel-button.prev {
            left: 10px;
        }

        .carousel-button.next {
            right: 10px;
        }

        .carousel-button:disabled {
            background-color: rgba(0, 0, 0, 0.2);
            cursor: not-allowed;
        }

        .thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            overflow-x: auto;
            padding: 10px 0;
            scroll-behavior: smooth;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 4px;
            opacity: 0.6;
            transition: all 0.3s ease;
        }

        .thumbnail.active {
            opacity: 1;
            border: 2px solid #2196F3;
            transform: scale(1.1);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Détails de l'offre</h1>

        <?php if (!empty($errors)): ?>
            <?php foreach($errors as $error): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!empty($uploadedImages)): ?>
            <div class="carousel">
                <div class="carousel-container">
                    <button class="carousel-button prev" onclick="previousImage()" id="prevButton">&#10094;</button>
                    <img src="<?php echo 'imagesOffres/' . $uploadedImages[0]; ?>" 
                        alt="Image principale" 
                        class="main-image" 
                        id="main-image">
                    <button class="carousel-button next" onclick="nextImage()" id="nextButton">&#10095;</button>
                </div>
                <div class="thumbnails" id="thumbnails-container">
                    <?php foreach($uploadedImages as $index => $image): ?>
                        <img src="<?php echo 'imagesOffres/' . $image; ?>" 
                            alt="Miniature <?php echo $index + 1; ?>" 
                            class="thumbnail <?php echo $index === 0 ? 'active' : ''; ?>"
                            onclick="changeMainImage(this.src, this, <?php echo $index; ?>)"
                            data-index="<?php echo $index; ?>">
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="info-section">
            <div class="info-title">Informations générales</div>
            <p><strong>Libellé:</strong> <?php echo htmlspecialchars($_POST['libelle'] ?? ''); ?></p>
            <p><strong>Catégorie:</strong> <?php echo htmlspecialchars($_POST['categorie'] ?? ''); ?></p>
            <p><strong>Nombre de pièces:</strong> <?php echo htmlspecialchars($_POST['pieces'] ?? ''); ?></p>
            <p><strong>Superficie:</strong> <?php echo htmlspecialchars($_POST['superficie'] ?? ''); ?> m²</p>
        </div>

        <div class="info-section">
            <div class="info-title">Disponibilité et Prix</div>
            <p><strong>Date de disponibilité:</strong> <?php echo htmlspecialchars($_POST['date_dispo'] ?? ''); ?></p>
            <p><strong>Prix:</strong> <?php echo htmlspecialchars($_POST['prix'] ?? ''); ?> €/mois</p>
            <p><strong>Statut:</strong> <?php echo ($_POST['disponibilite'] ?? '') == '1' ? 'Disponible' : 'Non disponible'; ?></p>
        </div>

        <div class="info-section">
            <div class="info-title">Description</div>
            <p><?php echo nl2br(htmlspecialchars($_POST['description'] ?? '')); ?></p>
        </div>

        <div class="info-section">
            <div class="info-title">Contact</div>
            <p><strong>Email du commercial:</strong> <?php echo htmlspecialchars($_POST['email'] ?? ''); ?></p>
        </div>
    </div>

    <script>
        let currentImageIndex = 0;
        const images = document.querySelectorAll('.thumbnail');
        const totalImages = images.length;

        function updateButtons() {
            document.getElementById('prevButton').disabled = currentImageIndex === 0;
            document.getElementById('nextButton').disabled = currentImageIndex === totalImages - 1;
        }

        function changeMainImage(src, thumbnail, index) {
            const mainImage = document.getElementById('main-image');
            mainImage.style.opacity = '0';
            
            setTimeout(() => {
                mainImage.src = src;
                mainImage.style.opacity = '1';
            }, 200);

            document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
            thumbnail.classList.add('active');
            
            currentImageIndex = index;
            updateButtons();

            // Faire défiler les miniatures pour centrer l'image active
            const thumbnailsContainer = document.getElementById('thumbnails-container');
            const thumbnailWidth = thumbnail.offsetWidth + 10; // 10 pour le gap
            const scrollPosition = thumbnail.offsetLeft - (thumbnailsContainer.offsetWidth / 2) + (thumbnailWidth / 2);
            thumbnailsContainer.scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
            });
        }

        function nextImage() {
            if (currentImageIndex < totalImages - 1) {
                const nextThumbnail = document.querySelector(`[data-index="${currentImageIndex + 1}"]`);
                changeMainImage(nextThumbnail.src, nextThumbnail, currentImageIndex + 1);
            }
        }

        function previousImage() {
            if (currentImageIndex > 0) {
                const prevThumbnail = document.querySelector(`[data-index="${currentImageIndex - 1}"]`);
                changeMainImage(prevThumbnail.src, prevThumbnail, currentImageIndex - 1);
            }
        }

        // Ajout des contrôles clavier
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                previousImage();
            } else if (e.key === 'ArrowRight') {
                nextImage();
            }
        });

        // Initialisation
        updateButtons();
    </script>
</body>
</html>