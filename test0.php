<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

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
<h1>Exercices PHP5$</h1>
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
    

</body>
</html>