<?php
// Partie 1: Tableau des prix
function analyserPrix() {
    // Création du tableau des prix
    $prix = [
        125000, 850000, 145000, 275000, 
        950000, 185000, 155000, 475000, 
        650000, 225000
    ];
    
    // Affichage de tous les prix
    echo "<div class='analyse-section'>";
    echo "<h3>Liste des prix</h3>";
    echo "<div class='prix-list'>";
    foreach ($prix as $p) {
        echo "<span class='prix'>" . number_format($p, 0, ',', ' ') . " FCFA</span>";
    }
    echo "</div>";
    
    // Calcul et affichage du prix moyen
    $moyenne = array_sum($prix) / count($prix);
    echo "<div class='resultat'>";
    echo "<p><strong>Prix moyen :</strong> " . number_format($moyenne, 0, ',', ' ') . " FCFA</p>";
    
    // Calcul du min et max avec foreach
    $min = $prix[0];
    $max = $prix[0];
    foreach ($prix as $p) {
        if ($p < $min) $min = $p;
        if ($p > $max) $max = $p;
    }
    echo "<p><strong>Prix minimum :</strong> " . number_format($min, 0, ',', ' ') . " FCFA</p>";
    echo "<p><strong>Prix maximum :</strong> " . number_format($max, 0, ',', ' ') . " FCFA</p>";
    
    // Comptage des prix ≤ 150000
    $count = 0;
    foreach ($prix as $p) {
        if ($p <= 150000) $count++;
    }
    echo "<p><strong>Nombre de prix ≤ 150 000 FCFA :</strong> $count</p>";
    
    // Test présence de 750000
    $present = false;
    foreach ($prix as $p) {
        if ($p === 750000) {
            $present = true;
            break;
        }
    }
    echo "<p><strong>Prix de 750 000 FCFA :</strong> " . 
         ($present ? "Présent" : "Non présent") . "</p>";
    echo "</div></div>";
}

// Partie 2: Tableau associatif
function gererProduit() {
    // Création du tableau associatif
    $produit = [
        "nom" => "MacBook Pro",
        "prix" => 1299000,
        "catégorie" => "Ordinateur portable",
        "marque" => "Apple",
        "pays" => "États-Unis",
        "année" => 2023,
        "écran" => "14 pouces",
        "processeur" => "Apple M2"
    ];
    
    // Affichage initial
    echo "<div class='produit-section'>";
    echo "<h3>Informations du produit</h3>";
    echo "<div class='info-container initial-info'>";
    echo "<h4>Informations initiales</h4>";
    foreach ($produit as $key => $value) {
        if ($key === "prix") {
            echo "<p><strong>$key :</strong> " . number_format($value, 0, ',', ' ') . " FCFA</p>";
        } else {
            echo "<p><strong>$key :</strong> $value</p>";
        }
    }
    echo "</div>";
    
    // Affichage nom et prix
    echo "<div class='info-container prix-info'>";
    echo "<h4>Nom et prix</h4>";
    echo "<p><strong>Nom :</strong> {$produit['nom']}</p>";
    echo "<p><strong>Prix :</strong> " . number_format($produit['prix'], 0, ',', ' ') . " FCFA</p>";
    echo "</div>";
    
    // Augmentation du prix de 30%
    $produit['prix'] = $produit['prix'] * 1.3;
    
    // Affichage après modification
    echo "<div class='info-container updated-info'>";
    echo "<h4>Informations après augmentation de 30%</h4>";
    foreach ($produit as $key => $value) {
        if ($key === "prix") {
            echo "<p><strong>$key :</strong> " . number_format($value, 0, ',', ' ') . " FCFA</p>";
        } else {
            echo "<p><strong>$key :</strong> $value</p>";
        }
    }
    echo "</div>";
    echo "</div>";
}
?>