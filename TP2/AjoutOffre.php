<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'une offre de location</title>
    <style>
        :root {
            --primary-color: #2196F3;
            --secondary-color: #1976D2;
            --background-color: #f5f5f5;
            --text-color: #333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: var(--background-color);
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: var(--text-color);
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .photo-upload {
            border: 2px dashed #ddd;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        button {
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: var(--secondary-color);
        }

        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .preview-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter une offre de location</h1>
        
        <form action="traiterAddOffre.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="libelle">Libellé de l'offre*</label>
                <input type="text" id="libelle" name="libelle" required>
            </div>

            <div class="form-group">
                <label for="categorie">Catégorie*</label>
                <select id="categorie" name="categorie" required>
                    <option value="">Sélectionnez une catégorie</option>
                    <option value="villa">Villa</option>
                    <option value="appartement">Appartement</option>
                    <option value="studio">Studio</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pieces">Nombre de pièces*</label>
                <input type="number" id="pieces" name="pieces" min="1" required>
            </div>

            <div class="form-group">
                <label for="superficie">Superficie (m²)*</label>
                <input type="number" id="superficie" name="superficie" min="1" required>
            </div>

            <div class="form-group">
                <label for="date_dispo">Date de disponibilité*</label>
                <input type="date" id="date_dispo" name="date_dispo" required>
            </div>

            <div class="form-group">
                <label for="prix">Prix de location (€/mois)*</label>
                <input type="number" id="prix" name="prix" min="0" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="disponibilite">Disponibilité*</label>
                <select id="disponibilite" name="disponibilite" required>
                    <option value="1">Disponible</option>
                    <option value="0">Non disponible</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description détaillée*</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="email">Email du commercial*</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Photos de l'offre*</label>
                <div class="photo-upload">
                    <input type="file" id="photos" name="photos[]" accept="image/*" multiple required>
                    <p>Glissez vos photos ici ou cliquez pour sélectionner</p>
                    <div class="preview-container" id="preview"></div>
                </div>
            </div>

            <button type="submit">Publier l'offre</button>
        </form>
    </div>

    <script>
        // Prévisualisation des images
        document.getElementById('photos').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            preview.innerHTML = '';
            
            [...e.target.files].forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'preview-image';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
</body>
</html>