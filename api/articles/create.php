<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Activer l'affichage des erreurs pour le développement
ini_set('display_errors', 1);
error_reporting(E_ALL);


$libTitrArt = ctrlSaisies($_POST['libTitrArt']);
$libChapoArt = ctrlSaisies($_POST['libChapoArt']);
$libAccrochArt = ctrlSaisies($_POST['libAccrochArt']);
$parag1Art = ctrlSaisies($_POST['parag1Art']);
$libSsTitr1Art = ctrlSaisies($_POST['libSsTitr1Art']);
$parag2Art = ctrlSaisies($_POST['parag2Art']);
$libSsTitr2Art = ctrlSaisies($_POST['libSsTitr2Art']);
$parag3Art = ctrlSaisies($_POST['parag3Art']);
$libConclArt = ctrlSaisies($_POST['libConclArt']);
$numThem = ctrlSaisies($_POST['numThem']);
        

$newMotCle = $_POST['motCle'];
var_dump($newMotCle);
var_dump(gettype($newMotCle));


$numMotCle = $_POST['motCle'];
$urlPhotArt = "";
if (isset($_FILES['urlPhotArt']) && $_FILES['urlPhotArt']['error'] === 0) {
    $tmpName = $_FILES['urlPhotArt']['tmp_name'];
    $name = $_FILES['urlPhotArt']['name'];
    $size = $_FILES['urlPhotArt']['size'];

    // Vérification de la taille de l'image
    if ($size > 10000000) {
        die("Le fichier est trop volumineux.");
    }

    // Vérification des dimensions de l'image
    list($width, $height) = getimagesize($tmpName);
    if ($width > 5000 || $height > 5000) {
        die("L'image est trop grande.");
    }

    // Définir un nom unique pour l'image
    $nom_image = time() . '_' . $name;
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/src/uploads/';
    $destination = $uploadDir . $nom_image;

    if (!move_uploaded_file($tmpName, $destination)) {
        die("Erreur lors de l'upload de l'image.");
    }

}


// Insertion dans la table ARTICLE
sql_insert(
    'ARTICLE',
    'libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, urlPhotArt, numThem',
    "'$libTitrArt', '$libChapoArt', '$libAccrochArt', '$parag1Art', '$libSsTitr1Art', '$parag2Art', '$libSsTitr2Art', '$parag3Art', '$libConclArt', '$nom_image', '$numThem'"
);
$lastArt = sql_select('ARTICLE', 'numArt', null, 'numArt DESC')[0]['numArt'];
var_dump($lastArt);



foreach ($numMotCle as $mot){
    sql_insert('MOTCLEARTICLE', 'numArt, numMotCle', "$lastArt, $mot");
}




// Redirection après l'insertion
header('Location: ../../views/backend/articles/list.php');
exit;

?>
