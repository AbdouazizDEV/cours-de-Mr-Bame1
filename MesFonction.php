<!-- Définir une fonction WELCOM qui prend en parametre le nom, prenomn et le sexe (Valeur par défaut M) puis afficher un message de Bienvenu personnaliser  -->

<?php
function WELCOM($nom, $prenom, $sexe = "M")
{
    if (strtolower($sexe) == "M") {
        echo "<p>Bienvenue Mr $nom $prenom</p>";
    } else {
        echo "<p>Bienvenue Mme $nom $prenom</p>";
    }
}