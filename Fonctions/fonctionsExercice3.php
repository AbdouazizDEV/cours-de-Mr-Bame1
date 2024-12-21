<?php
// Fonction pour créer une ligne d'étoiles
function createLine($length, $hollow = false, $position = 0) {
    $line = '';
    for ($i = 0; $i < $length; $i++) {
        if ($hollow && ($i > 0 && $i < $length - 1) && ($position > 0 && $position < $length - 1)) {
            $line .= '&nbsp;&nbsp;';
        } else {
            $line .= '* ';
        }
    }
    return $line;
}

// Fonction pour créer un carré
function createSquare($size, $hollow = false) {
    $output = '<div class="figure">';
    $output .= '<h3>' . ($hollow ? 'Carré creux' : 'Carré plein') . ' ' . $size . 'x' . $size . '</h3>';
    $output .= '<pre>';
        
        for ($i = 0; $i < $size; $i++) {
            $output .= createLine($size, $hollow, $i) . "\n";
        }
    
    $output .= '</pre></div>';
    return $output;
}

// Fonction pour créer un triangle rectangle
function createTriangle($size, $orientation = 'bottom-right', $hollow = false) {
    $output = '<div class="figure">';
    $output .= '<h3>Triangle ' . ($hollow ? 'creux' : 'plein') . ' (' . $orientation . ')</h3>';
    $output .= '<pre>';
    
    switch ($orientation) {
        case 'bottom-right':
            for ($i = 1; $i <= $size; $i++) {
                $spaces = str_repeat('&nbsp;&nbsp;', $size - $i);
                $stars = '';
                for ($j = 1; $j <= $i; $j++) {
                    if ($hollow && $j > 1 && $j < $i && $i < $size) {
                        $stars .= '&nbsp;&nbsp;';
                    } else {
                        $stars .= '* ';
                    }
                }
                $output .= $spaces . $stars . "\n";
            }
            break;
            
        case 'bottom-left':
            for ($i = 1; $i <= $size; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    if ($hollow && $j > 1 && $j < $i && $i < $size) {
                        $output .= '&nbsp;&nbsp;';
                    } else {
                        $output .= '* ';
                    }
                }
                $output .= "\n";
            }
            break;
            
        case 'top-right':
            for ($i = $size; $i >= 1; $i--) {
                $spaces = str_repeat('&nbsp;&nbsp;', $size - $i);
                $stars = '';
                for ($j = 1; $j <= $i; $j++) {
                    if ($hollow && $j > 1 && $j < $i && $i > 1) {
                        $stars .= '&nbsp;&nbsp;';
                    } else {
                        $stars .= '* ';
                    }
                }
                $output .= $spaces . $stars . "\n";
            }
            break;
            
        case 'top-left':
            for ($i = $size; $i >= 1; $i--) {
                for ($j = 1; $j <= $i; $j++) {
                    if ($hollow && $j > 1 && $j < $i && $i > 1) {
                        $output .= '&nbsp;&nbsp;';
                    } else {
                        $output .= '* ';
                    }
                }
                $output .= "\n";
            }
            break;
    }
    
    $output .= '</pre></div>';
    return $output;
}

// Fonction pour afficher toutes les figures
function displayAllFigures() {
    $size = 8; // Taille standard demandée
    
    echo '<div class="figures-container">';
    
    // Lignes
    echo '<div class="figures-row">';
    echo '<h3 class="figures-title">Lignes orizontales</h3>';
    //echo createLine($size, false);
    echo createLine($size, true);
    echo '</div>';
    
    // Carrés
    echo '<div class="figures-row">';
    echo createSquare($size, false);
    echo createSquare($size, true);
    echo '</div>';
    
    // Triangles pleins
    echo '<div class="figures-row">';
    echo createTriangle($size, 'bottom-left', false);
    echo createTriangle($size, 'bottom-right', false);
    echo '</div>';
    
    echo '<div class="figures-row">';
    echo createTriangle($size, 'top-left', false);
    echo createTriangle($size, 'top-right', false);
    echo '</div>';
    
    // Triangles creux
    echo '<div class="figures-row">';
    echo createTriangle($size, 'bottom-left', true);
    echo createTriangle($size, 'bottom-right', true);
    echo '</div>';
    
    echo '<div class="figures-row">';
    echo createTriangle($size, 'top-left', true);
    echo createTriangle($size, 'top-right', true);
    echo '</div>';
    
    echo '</div>';
}
?>