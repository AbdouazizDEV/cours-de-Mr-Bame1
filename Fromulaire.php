 <!-- on va créer un formulaire HTML pour saisir le nom, prenom, date de naissance,telephone et age en paramètre GET -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #f0f0f0;
        }

        form{
            width: 722px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label{
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="tel"],
        input[type="number"]{
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .nationnalite{
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="recupForme.php" method="post" enctype="multipart/form-data">
        
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom"><br>

        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom"><br>

        <label for="naissance">Date de naissance:</label>
        <input type="date" id="naissance" name="naissance"><br>

        <label for="telephone">Telephone:</label>
        <input type="tel" id="telephone" name="telephone"><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age"><br>
        <!-- input pour selectionner les nationnalités  on utilise des checkbox-->
         <div class="nationnalite">
             <label for="nationnalite">Nationnalite:</label>
             <input type="checkbox" id="nationnalite" name="nationnalite" value="francaise"><label for="nationnalite">Francaise</label>
             <input type="checkbox" id="nationnalite" name="nationnalite" value="anglaise"><label for="nationnalite">Anglaise</label>
             <input type="checkbox" id="nationnalite" name="nationnalite" value="espagnole"><label for="nationnalite">Espagnole</label>
             <input type="checkbox" id="nationnalite" name="nationnalite" value="italienne"><label for="nationnalite">Italienne</label><br>
        </div>
       <!-- ajouter un input de type de file -->
        <label for="photo" name="Max_FILE_SIZE" value="30000000" >Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*"><br>
        
        <label for="sexe">Sexe:</label>
        <input type="radio" id="sexe" name="sexe" value="Homme"><label for="sexe">Homme</label>
        <input type="radio" id="sexe" name="sexe" value="Femme"><label for="sexe">Femme</label><br>

        <input type="submit" value="Envoyer">

    </form>
</body>
</html>