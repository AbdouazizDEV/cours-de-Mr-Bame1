<!-- ValidationLogin/verifAuthent.php -->
<?php
$login = $_POST['login'];
$password = $_POST['password'];

// Vérification des identifiants
if ($login == 'djiby' && $password == 'ndiaga') {
    // Redirection vers la page d'accueil si les identifiants sont corrects
    header("Location: Accueil.php");
} else {
    // Redirection vers le formulaire d'authentification en cas d'échec
    header("Location: index.php");
}
?>
