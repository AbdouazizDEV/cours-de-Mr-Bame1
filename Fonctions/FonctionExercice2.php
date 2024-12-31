<?php
// Fonction pour ordonner les chiffres dans l'ordre décroissant
function orderDigitsDescending($digits) {
    rsort($digits); // Trie le tableau dans l'ordre décroissant
    return $digits;
}

// Fonction pour vérifier si les chiffres sont tous différents et entre 1 et 9
function areDigitsValid($digits) {
    $used = [];
    foreach ($digits as $digit) {
        if ($digit < 1 || $digit > 9 || isset($used[$digit])) {
            return false;
        }
        $used[$digit] = true;
    }
    return true;
}

// Fonction qui génère tous les quadruplets possibles pour une somme N
function findAllQuadruplets($N) { 
    $solutions = [];
    // Génère tous les quadruplets possibles où a < b < c < d
    for ($a = 1; $a <= 6; $a++) {
        for ($b = $a + 1; $b <= 7; $b++) {
            for ($c = $b + 1; $c <= 8; $c++) {
                for ($d = $c + 1; $d <= 9; $d++) {
                    if ($a + $b + $c + $d == $N) {
                        $solutions[] = [$a, $b, $c, $d];
                    }
                }
            }
        }
    }
    return $solutions;
}

// Fonction principale d'affichage
function displayResults() {
    echo "<div class='input-section'>";
    echo "<form method='post' class='digits-form'>";
    echo "<h3>Entrez les 4 plaquettes tirées (chiffres de 1 à 9) :</h3>";
    for ($i = 1; $i <= 4; $i++) {
        echo "<div class='input-group'>";
        echo "<label for='digit$i'>Plaquette $i :</label>";
        echo "<input type='number' id='digit$i' name='digit$i' min='1' max='9' required ";
        if (isset($_POST["digit$i"])) {
            echo "value='" . htmlspecialchars($_POST["digit$i"]) . "'";
        }
        echo ">";
        echo "</div>";
    }
    echo "<button type='submit'>Analyser</button>";
    echo "</form>";
    echo "</div>";

    if (isset($_POST['digit1'])) {
        // Récupérer les chiffres entrés
        $inputDigits = [
            intval($_POST['digit1']),
            intval($_POST['digit2']),
            intval($_POST['digit3']),
            intval($_POST['digit4'])
        ];

        if (!areDigitsValid($inputDigits)) {
            echo "<p class='error'>Erreur : Les chiffres doivent être différents et compris entre 1 et 9.</p>";
            return;
        }

        // Ordonner les chiffres dans l'ordre décroissant
        $orderedDigits = orderDigitsDescending($inputDigits);
        $sum = array_sum($orderedDigits);

        echo "<div class='results'>";
        echo "<h3>Analyse des plaquettes tirées :</h3>";
        echo "<p>Plaquettes dans l'ordre décroissant : " . implode(" > ", $orderedDigits) . "</p>";
        echo "<p>Somme des chiffres : $sum</p>";

        // Si la somme est valide (entre 10 et 30), chercher tous les quadruplets possibles
        if ($sum >= 10 && $sum <= 30) {
            $allQuadruplets = findAllQuadruplets($sum);
            echo "<h3>Tous les quadruplets possibles pour N = $sum :</h3>";
            echo "<ul class='solutions'>";
            foreach ($allQuadruplets as $quad) {
                $orderedQuad = array_reverse($quad); // Pour avoir dans l'ordre décroissant
                echo "<li>" . implode(" > ", $orderedQuad) . "</li>";
            }
            echo "</ul>";
            echo "<p class='total'>Nombre total de quadruplets valides : " . count($allQuadruplets) . "</p>";
        } else {
            echo "<p class='error'>La somme ($sum) n'est pas comprise entre 10 et 30.</p>";
        }
        echo "</div>";
    }
}
?>