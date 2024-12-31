<!-- on va faire ici un formulaire pour enregitrer les voiture on aura les champ code,marque,modele,categorie,quantite unitaire, quantite disponible,date d'achat, option (vente ou location ) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="recupFormulair.php" method="post">
        <div class="code">
            <label for="code">Code:</label>
            <input type="text" id="code" name="code" required><br><br>
        </div>
        <div class="marque">
            <label for="marque">Marque:</label>
            <input type="text" id="marque" name="marque" required><br><br>
        </div>
        <div class="modele">
            <label for="modele">Modèle:</label>
            <select id="modele" name="modele" required>
                <option value="">Sélectionnez un modèle</option>
                <optgroup label="Toyota">
                    <option value="corolla">Corolla</option>
                    <option value="camry">Camry</option>
                    <option value="rav4">RAV4</option>
                    <option value="land-cruiser">Land Cruiser</option>
                </optgroup>
                <optgroup label="Honda">
                    <option value="civic">Civic</option>
                    <option value="accord">Accord</option>
                    <option value="cr-v">CR-V</option>
                </optgroup>
                <optgroup label="Mercedes">
                    <option value="classe-a">Classe A</option>
                    <option value="classe-c">Classe C</option>
                    <option value="classe-e">Classe E</option>
                    <option value="gla">GLA</option>
                </optgroup>
                <optgroup label="BMW">
                    <option value="serie-3">Série 3</option>
                    <option value="serie-5">Série 5</option>
                    <option value="x3">X3</option>
                    <option value="x5">X5</option>
                </optgroup>
            </select>
        </div>

        <div class="categorie">
            <label for="categorie">Catégorie:</label>
            <select id="categorie" name="categorie" required>
                <option value="">Sélectionnez une catégorie</option>
                <option value="berline">Berline</option>
                <option value="suv">SUV</option>
                <option value="4x4">4x4</option>
                <option value="citadine">Citadine</option>
                <option value="break">Break</option>
                <option value="coupe">Coupé</option>
                <option value="cabriolet">Cabriolet</option>
            </select>
        </div>
        <!-- ajouter une photo -->
         <div class="photo">
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" required><br><br>
        </div>
        <div class="quantite_unitaire">
            <label for="quantite_unitaire">Quantite unitaire:</label>
            <input type="number" id="quantite_unitaire" name="quantite_unitaire" required><br><br>
        </div>
        <div class="quantite_disponible">
            <label for="quantite_disponible">Quantite disponible:</label>
            <input type="number" id="quantite_disponible" name="quantite_disponible" required><br><br>
        </div>
        <div class="date_achat">
            <label for="date_achat">Date d'achat:</label>
            <input type="date" id="date_achat" name="date_achat" required><br><br>
        </div>
        <div class="option">
            <label for="option">Option:</label>
            <input type="radio" id="option" name="option" required>
            <label for="vente">Vente</label>
            <input type="radio" id="option" name="option" required><br>
            <label for="location">Location</label>
        </div>
        <div class="promo">
        <label for="option">En promo:</label>
            <input type="radio" id="option" name="option_promo" required>
            <label for="OUI">oui</label>
            <input type="radio" id="option" name="option_promo" required><br><br>
            <label for="NON">non</label>
        </div>
        <!-- ajoutez un chemps de description  -->
         <div class="description">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea><br><br>
        </div>
        <div>
            <input type="submit" value="Enregistrer">
            <input type="reset" value="Annuler">
        </div>
    </form>
</body>
</html>