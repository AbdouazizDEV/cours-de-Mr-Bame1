 <?php
// Fonction pour séparer un nombre en ses chiffres individuels
function getDigits($number) {
    return [
        floor($number / 100),      // centaines
        floor(($number % 100) / 10), // dizaines
        $number % 10               // unités
    ];
}

// Fonction pour vérifier si un nombre respecte les conditions
function checkCombination($number, $targetSum) {
    $digits = getDigits($number);
    
    // Vérifier que la somme des chiffres est égale au nombre cible
    if (array_sum($digits) !== $targetSum) {
        return false;
    }
    
    // Vérifier que les chiffres des centaines et dizaines sont divisibles par 3
    if ($digits[0] % 3 !== 0 || $digits[1] % 3 !== 0) {
        return false;
    }
    
    return true;
}

// Fonction principale pour trouver toutes les combinaisons valides
function findValidCombinations() {
    // Tableau des nombres de signes du zodiac
    $zodiacNumbers = [4, 12, 13];
    
    // Pour chaque nombre de signes du zodiac
    foreach ($zodiacNumbers as $targetSum) {
        echo "<h3>Combinaisons possibles pour une somme de $targetSum :</h3>";
        $found = false;
        
        // Tester tous les nombres de 0 à 999
        for ($i = 0; $i < 1000; $i++) {
            if (checkCombination($i, $targetSum)) {
                $digits = getDigits($i);
                $formattedNumber = sprintf("%03d", $i);
                echo "<p>Combinaison valide: $formattedNumber " .
                     "(somme = $targetSum, chiffres: " . 
                     implode(', ', $digits) . ")</p>";
                $found = true;
            }
        }
        
        if (!$found) {
            echo "<p>Aucune combinaison trouvée pour la somme $targetSum</p>";
        }
    }
}
?>