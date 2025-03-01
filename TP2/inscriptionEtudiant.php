<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dossier d'Inscription Administrative</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .header h1 {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .section {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 15px;
        }

        .section-title {
            background-color: #ff007f;
            color: white;
            padding: 5px 10px;
            margin: -15px -15px 15px -15px;
        }

        .form-row {
            display: flex;
            margin-bottom: 10px;
            gap: 20px;
        }

        .form-group {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 0.9em;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .small-input {
            width: 60px !important;
        }

        .id-numbers {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .checkboxes {
            display: flex;
            gap: 20px;
        }

        .italic {
            font-style: italic;
            font-size: 0.9em;
        }
        .form-group div {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .form-group input[type="radio"] {
            margin-right: 8px;
        }

        .form-group label[for] {
            display: inline;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>UNIVERSITÉ CHEIKH ANTA DIOP DE DAKAR</h1>
        <h2>DOSSIER D'INSCRIPTION ADMINISTRATIVE</h2>
    </div>

    <form action="traiterInscription.php" method="POST" enctype="multipart/form-data">
        <div class="id-numbers">
            <div>
                <label>N° d'Etudiant</label>
                <input type="text" pattern="\d*" maxlength="9">
            </div>
            <div>
                <label>N° Quittance d'inscription</label>
                <input type="text" pattern="\d*" maxlength="8">
            </div>
        </div>

        <div class="section">
            <div class="section-title">2 - ETAT-CIVIL</div>
            <div class="form-row">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="nom">
                </div>
                <div class="form-group">
                    <label>Prénom 1</label>
                    <input type="text" name="prenom1">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Nom du mari</label>
                    <input type="text" name="nom_mari">
                </div>
                <div class="form-group">
                    <label>Prénom 2</label>
                    <input type="text" name="prenom2">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Date de naissance</label>
                    <input type="text" name="date_naissance" class="small-input">
                </div>
                <div class="form-group">
                    <label>Sexe</label>
                    <div>
                        <input type="radio" name="sexe" class="small-input">
                        <label for="sexe_homme">Homme</label>
                    </div>
                    <div>
                        <input type="radio" name="sexe" class="small-input">
                        <label for="sexe_femme">Femme</label>
                    </div>
                    <div>
                        <input type="radio" name="sexe" class="small-input">
                        <label for="sexe_autre">Autre</label>
                    </div>
                   
                    <!-- <input type="radio" name="sexe" class="small-input"> -->
                </div>
                <div class="form-group">
                    <label>Prénom 3</label>
                    <input type="text" name="prenom3">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Lieu de naissance</label>
                    <input type="text" name="lieu_naissance">
                </div>
                <div class="form-group">
                    <label>Pays de naissance</label>
                    <input type="text" name="pays_naissance">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Région de naissance</label>
                    <input type="text" name="region_naissance">
                </div>
                <div class="form-group">
                    <label>Nationalité</label>
                    <input type="text" name="nationalite">
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">3 - ADRESSE ACTUELLE</div>
            <div class="form-row">
                <div class="form-group">
                    <label>Adresse à Dakar <span class="italic">(obligatoire)</span></label>
                    <input type="text" name="adresse_dakar" required>
                </div>
                <div class="form-group">
                    <label>Boîte postale</label>
                    <input type="text" name="boite_postale">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Téléphone</label>
                    <input type="tel" name="telephone">
                </div>
                <div class="form-group">
                    <label>Portable</label>
                    <input type="tel" name="portable">
                </div>
                <div class="form-group">
                    <label>E-mail <span class="italic">(obligatoire)</span></label>
                    <input type="email" name="email" required>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">4 - EMPLOI</div>
            <div class="form-row">
                <div class="form-group">
                    <label>Exercez-vous une activité salariée ?</label>
                    <div class="checkboxes">
                        <label><input type="radio" name="activite_salariee" value="oui"> Oui</label>
                        <label><input type="radio" name="activite_salariee" value="non"> Non</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Statut de l'Étudiant</label>
                    <div class="checkboxes">
                        <label><input type="checkbox" name="regime_normal"> Régime normal</label>
                        <label><input type="checkbox" name="regime_salarie"> Régime salarié</label>
                        <label><input type="checkbox" name="regime_particulier"> Régime particulier</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Catégorie socioprofessionnelle</label>
                    <input type="text" name="categorie_sociopro">
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">5 - SITUATION FAMILIALE</div>
            <div class="form-row">
                <div class="form-group">
                    <label>Situation familiale</label>
                    <input type="text" name="situation_familiale">
                </div>
                <div class="form-group">
                    <label>Nombre d'enfants</label>
                    <input type="number" name="nombre_enfants" class="small-input">
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">6 - INSCRIPTION ANNUELLE</div>
            <div class="form-row">
                <div class="form-group">
                    <label>Année d'étude</label>
                    <input type="text" name="annee_etude">
                </div>
                <div class="form-group">
                    <label>Cycle</label>
                    <input type="text" name="cycle">
                </div>
                <div class="form-group">
                    <label>Département</label>
                    <input type="text" name="departement">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Option choisie</label>
                    <input type="text" name="option">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Redoublez-vous ?</label>
                    <div class="checkboxes">
                        <label><input type="radio" name="redoublement" value="oui"> Oui</label>
                        <label><input type="radio" name="redoublement" value="non"> Non</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Horaires des TD</label>
                    <div class="checkboxes">
                        <label><input type="radio" name="horaires_td" value="avant18h"> Avant 18H</label>
                        <label><input type="radio" name="horaires_td" value="apres18h"> Après 18H</label>
                        <label><input type="radio" name="horaires_td" value="regime_particulier"> Régime particulier</label>
                    </div>
                </div>
            </div>
        </div>
        <fieldset>
            <legend>Photo de profil</legend>
            <input type="file" id="photo" name="photo" accept="image/*">
        </fieldset>
        <br>
        <!-- button de couleur ff007f-->
        <div class="form-row">
            <button type="submit" style="background-color: #ff007f; color: white; padding: 10px 20px; border: none; cursor: pointer;">Envoyer</button>
        </div>

    </form>
</body>
</html>