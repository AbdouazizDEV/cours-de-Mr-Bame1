<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style.css">

    <title>Exercices PHP</title>
</head>
<body>

<h1>Exercices PHP1</h1>
    <!-- Table de multiplication pour $a -->
    <div class="notes-section">
        <?php
        $a = 5;
        echo "<h3>Table de multiplication de $a</h3>";
        for ($i = 1; $i <= 10; $i++) {
            echo $a . " x " . $i . " = " . $a * $i . "<br>";
        }
        ?>
    </div>


    <hr>
<h1>Exercices PHP2</h1>
    <!-- Tableaux des tables de multiplication -->
     <div class="tables-section">
        <div class="tables-container">
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "<div class='table-container table-$i'>";
                echo "<table>";
                echo "<tr><td>Table de $i</td></tr>";
                for ($j = 1; $j <= 10; $j++) {
                    echo "<tr><td>" . $i . " x " . $j . " = " . ($i * $j) . "</td></tr>";
                }
                echo "</table>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <hr>
<h1>Exercices PHP3</h1>
    <!-- Message de bienvenue -->
    <div class="welcome-section">
        <?php
        $nom = "Wadiou";
        $prenom = "Bakh";
        $sexe = "M";

        if (strtolower($sexe) == "m") {
            echo "<p>Bienvenue Mr $nom $prenom</p>";
        } else {
            echo "<p>Bienvenue Mme $nom $prenom</p>";
        }
        ?>
    </div>

    <hr>
<h1>Exercices PHP4</h1>
    <!-- Analyse des notes -->
    <div class="notes-section">
        <?php
        $notes = [1, 11, 10, 10, 10, 19, 10, 12, 10, 10, 8, 10, 10, 10, 10];

        echo "<h3>Analyse des notes</h3>";
        echo "<ul>";
        echo "<li>Les notes sont: " . implode(", ", $notes) . "</li>";
        echo "<li>Le nombre de notes supérieures à 10 : " . count(array_filter($notes, fn($n) => $n > 10)) . "</li>";
        echo "<li>La meilleure note : " . max($notes) . "</li>";
        echo "<li>La pire note : " . min($notes) . "</li>";
        echo "<li>La moyenne : " . round(array_sum($notes) / count($notes), 2) . "</li>";
        echo "</ul>";
        ?>
    </div>

    <hr>
<h1>Exercices PHP5</h1>
    <!-- Informations des étudiants -->
    <div class="students-section">
        <?php
        $students = [
            "Wadiou" => ["effectif" => 39, "niveau" => 2, "etablissement" => "Section informatique", "filier" => "devweb"],
            "Tarkinda" => ["effectif" => 61, "niveau" => 1, "etablissement" => "Milleu bi", "filier" => "toth sa mbari"],
            "Boudjouman" => ["effectif" => 99, "niveau" => 3, "etablissement" => "Grand Yoff", "filier" => "glou-glou"],
        ];

        echo "<h3>Informations des étudiants</h3>";
        echo "<table>";
        echo "<tr><th>Nom</th><th>Effectif</th><th>Filière</th></tr>";
        foreach ($students as $nom => $info) {
            echo "<tr>";
            echo "<td>$nom</td>";
            echo "<td>{$info['effectif']}</td>";
            echo "<td>{$info['filier']}</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
    <hr>    
    <h1>Exercices PHP6</h1>
    <!-- définire une fonction qui affiche la tables de multiplication pour un nombre entier passer en paramètre( s'il en à, sinon on affiche la table de multiplication de 5) le tous afficher dans un tableau html  -->
    
    
    
    <?php 
        
         function table($a)
         {
             for ($i = 1; $i <= 10; $i++) {
                 echo $a . " x " . $i . " = " . $a * $i . "<br>";
             }
         }
        // table(5);
          
        /* le maintenant on  doit être afficher dans un tablea html de 1 à 12 en utilisant cette fonction */

           for ($i = 1; $i <= 12; $i++) {
                echo "<div class='table-container table-$i'>";
                echo "<table>";
                echo "<tr><td>Table de $i</td></tr>";
                echo "<tr><td>" . table($i) . "</td></tr>";
                echo "</table>";
                echo "</div>";
            }
            echo "</table>";
            echo "</div>";

    ?>

    <hr>
    <!-- on doit utiliser le fichier MesFonction.php et appeler la fonction WELCOM qui afficher un message de Bienvenu personnaliser, on récupére le nom, prenom et sexe en paramètre GET -->
    <div class="welcome-section">
        <?php
        include 'MesFonction.php';
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $sexe = $_GET['sexe'];
            if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['sexe'])) {
                
                if (strtolower($sexe) == "m") {
                    echo "<p>Bienvenue Mr $nom $prenom</p>";
                } else {
                    echo "<p>Bienvenue Mme $nom $prenom</p>";
                }
            }
        ?>
       
    </div>
    <hr>
    <h1>Exercices PHP7</h1>
    <!-- on affiche le formulaire contneu dans le fichier Fromulaire.php -->
     <?php include 'Fromulaire.php';?>

            <hr>
        <h1>Formulair de saisie d'un etudiant </h1>
        <form action="FormulairEtudiant.php" method="post">
            <div class="code">
                <label for="code">Numero Etudiant:</label>
                <input type="text" id="code" name="code" required>
                <span class="error"><?php echo $codeError;?></span><br><br>
            </div>
            <div class="marque">
                <label for="marque">Nom:</label>
                <input type="text" id="marque" name="marque" required>
                <span class="error"><?php echo $marqueError;?></span><br><br>
            </div>
            <div class="prix">
                <label for="prix">Prenom:</label>
                <input type="text" id="prix" name="prix" required>
                <span class="error"><?php echo $prixError;?></span><br><br>
            </div>
            <div class="Adresse">
                <label for="Adresse">Adresse:</label>
                <input type="text" id="Adresse" name="Adresse" required>
                <span class="error"><?php echo $AdresseError;?></span><br><br>
            </div>
            <div>
                <input type="submit" value="Enregistrer">
            </div>
        </form>
     
<hr>
    
<style>
    form {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
}

.code, .marque, .prix, .Adresse {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: red;
    font-size: 0.9em;
    margin-top: 5px;
}

.success {
    color: green;
    background: #e8f5e9;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
    text-align: center;
}
</style>
</body>
</html>
