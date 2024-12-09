<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travaux Pratiques PHP</title>
    <link rel="stylesheet" href="styleTP.css">
    <link rel="stylesheet" href="styleExercice1.css">
    <link rel="stylesheet" href="styleExercice2.css">
    <link rel="stylesheet" href="styleExercice3.css">
    <link rel="stylesheet" href="styleExercice4.css">
</head>
<body>
    <?php
    // Initialisation des variables ou configurations nécessaires
    session_start();
    ?>
    
    <header class="banniere">
        <h1>Travaux Pratiques PHP</h1>
    </header>
    
    <nav class="menu-nav">
        <ul>
            <li><a href="#exercice1">Exercice 1</a></li>
            <li><a href="#exercice2">Exercice 2</a></li>
            <li><a href="#exercice3">Exercice 3</a></li>
            <li><a href="#exercice4">Exercice 4</a></li>
        </ul>
    </nav>
    
    <main id="les_sessions">
        <!-- Section pour l'exercice 1 -->
        <section id="exercice1" class="section-exercice">
            <h2>Exercice 1 - Serrure à combinaison</h2>
            
            <div class="description">
                <h3>Description du problème :</h3>
                <p>Trouver toutes les combinaisons valides d'une serrure à trois disques (0-9) selon les critères :</p>
                <ul>
                    <li>La somme des chiffres doit être égale à un nombre du zodiac (4, 12 ou 13)</li>
                    <li>Les chiffres des centaines et dizaines doivent être divisibles par 3</li>
                </ul>
            </div>

            <div class="results">
                <?php
                require 'fonctionsExercice1.php';
                // Exécution de la recherche des combinaisons
                findValidCombinations();
                ?>
            </div>
        </section>

       <!-- Section pour l'exercice 2 -->
        <section id="exercice2" class="section-exercice">
            <h2>Exercice 2 - Les plaquettes de Demba</h2>
            
            <div class="description">
                <h3>Description du problème :</h3>
                <p>Demba a disposé neuf plaquettes numérotées de 1 à 9 dans un sac. 
                Il en tire quatre d'un seul coup et il les ordonne en ordre décroissant.</p>
                <ul>
                    <li>Les chiffres doivent être différents (entre 1 et 9)</li>
                    <li>Les chiffres seront ordonnés automatiquement en ordre décroissant</li>
                    <li>La somme des chiffres doit être comprise entre 10 et 30</li>
                    <li>Le programme affichera tous les quadruplets possibles pour la somme obtenue</li>
                </ul>
            </div>

            <div class="results-container">
                <?php
                require 'FonctionExercice2.php';
                displayResults();
                ?>
            </div>
        </section>

        <!-- Section pour l'exercice 3 -->
        <section id="exercice3" class="section-exercice">
            <h2>Exercice 3 - Figures géométriques</h2>
            
            <div class="description">
                <h3>Description du problème :</h3>
                <ul>
                    <li>Création d'une ligne horizontale de 8 étoiles</li>
                    <li>Création d'un carré de 8x8 étoiles</li>
                    <li>Création de triangles rectangles avec différentes orientations</li>
                    <li>Création des mêmes figures en version creuse</li>
                </ul>
            </div>

            <?php
            require 'fonctionsExercice3.php';
            displayAllFigures();
            ?>
        </section>

        <!-- Section pour l'exercice 4 -->
<section id="exercice4" class="section-exercice">
    <h2>Exercice 4 - Tableaux PHP</h2>
    
    <div class="description">
        <h3>Description du problème :</h3>
        <ul>
            <li>Partie 1: Analyse d'un tableau de prix
                <ul>
                    <li>Affichage des éléments</li>
                    <li>Calcul du prix moyen</li>
                    <li>Recherche du min et max</li>
                    <li>Comptage des prix ≤ 150 000</li>
                    <li>Recherche d'un prix spécifique</li>
                </ul>
            </li>
            <li>Partie 2: Gestion d'un tableau associatif
                <ul>
                    <li>Création et affichage d'informations produit</li>
                    <li>Modification du prix</li>
                    <li>Affichage avec foreach</li>
                </ul>
            </li>
        </ul>
    </div>

    <?php
    require 'fonctionsExercice4.php';
    echo "<div class='partie1'>";
    echo "<h3>Partie 1 : Analyse des prix</h3>";
    analyserPrix();
    echo "</div>";
    
    echo "<div class='partie2'>";
    echo "<h3>Partie 2 : Informations produit</h3>";
    gererProduit();
    echo "</div>";
    ?>
</section>
    </main>
</body>
</html>