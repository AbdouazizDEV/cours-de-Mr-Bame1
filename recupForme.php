    <?php
/* ici on recupere les données du formulaire dans Fromulaire.php .Je presice qu'on utilise la methode pste*/

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$date_naissance = $_POST['naissance'];
$telephone = $_POST['telephone'];
/* récuperer les nationnalité selectionner dans une tableau */
$nationnalite = $_POST['nationnalite'];

$age = $_POST['age'];  
$sexe = $_POST['sexe'];

/* on verifie si tous les champs sont remplis */
if(!empty($nom) &&!empty($prenom) &&!empty($sexe) &&!empty($date_naissance)&&!empty($telephone) &&!empty($age)){
    echo" il faut remplire tous les champs sont mane";
}else{
    echo "Veuillez remplir tous les champs.";
}
/* on va afficher ces données dans ud div styler*/

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
    <style>
        .container {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 0 auto;
            width: 800px;   
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulaire</h2>
        <p>Nom : <?php echo $nom; ?></p>
        <p>Prenom : <?php echo $prenom; ?></p>
        <p>Sexe : <?php echo $sexe; ?></p>
        <p>Date de naissance : <?php echo $date_naissance; ?></p>
        <p>Nationnalite : <?php echo $nationnalite; ?></p>
        <p>Telephone : <?php echo $telephone; ?></p>
        <p>Age : <?php echo $age; ?></p>
    </div>
</body>
</html>


