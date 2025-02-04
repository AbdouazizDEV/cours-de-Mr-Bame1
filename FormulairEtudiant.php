<?php
// Initialisation des variables d'erreur
$codeError = $marqueError = $prixError = $AdresseError = "";
$isValid = true;

require_once 'vendor/autoload.php';//pour charger ces variables d'environnement

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];


try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
// Traitement du formulaire lors de la soumission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation du numéro étudiant
    if (empty($_POST["code"])) {
        $codeError = "Le numéro étudiant est requis";
        $isValid = false;
    }
    
    // Validation du nom
    if (empty($_POST["marque"])) {
        $marqueError = "Le nom est requis";
        $isValid = false;
    }
    
    // Validation du prénom
    if (empty($_POST["prix"])) {
        $prixError = "Le prénom est requis";
        $isValid = false;
    }
    
    // Validation de l'adresse
    if (empty($_POST["Adresse"])) {
        $AdresseError = "L'adresse est requise";
        $isValid = false;
    }
    
    // Si toutes les validations sont passées
    if ($isValid) {
        try {
            // Création de la connexion
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Préparation de la requête
            $stmt = $conn->prepare("INSERT INTO Etudiant (numero_etudiant, nom, prenom, adresse) 
                                  VALUES (:numero, :nom, :prenom, :adresse)");
            
            // Exécution de la requête avec les données du formulaire
            $stmt->execute([
                ':numero' => $_POST["code"],
                ':nom' => $_POST["marque"],
                ':prenom' => $_POST["prix"],
                ':adresse' => $_POST["Adresse"]
            ]);
            
            // Message de succès
            echo "<div class='success'>Étudiant enregistré avec succès!</div>";
            
        } catch(PDOException $e) {
            echo "<div class='error'>Erreur: " . $e->getMessage() . "</div>";
        }
        
        $conn = null;
    }
}
// Fonction de nettoyage des données
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Dans le traitement du formulaire, ajoutez :
$code = cleanInput($_POST["code"]);
$nom = cleanInput($_POST["marque"]);
$prenom = cleanInput($_POST["prix"]);
$adresse = cleanInput($_POST["Adresse"]);
?>