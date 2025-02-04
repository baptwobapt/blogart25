<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Activer l'affichage des erreurs pour le développement
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Récupération des données du formulaire
$dtMajArt = date("Y-m-d H:i:s");
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
$numArt = ctrlSaisies($_POST['numArt']);
$numMotCle = $_POST['motCle'];

// Récupérer l'ancienne image de l'article
$article = sql_select("ARTICLE", "urlPhotArt", "numArt = '$numArt'")[0];
$ancienneImage = $article['urlPhotArt'];

// Gestion de l'image
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

    // Supprimer l'ancienne image du serveur si elle existe et n'est pas celle par défaut
    if ($ancienneImage && file_exists($uploadDir . $ancienneImage)) {
        unlink($uploadDir . $ancienneImage);
    }

} else {
    // Si aucune nouvelle image n'est téléchargée, conserver l'image existante
    $nom_image = $ancienneImage;
}

// Variables pour la mise à jour de l'article
$set_art = "dtMajArt = '$dtMajArt',
libTitrArt = '$libTitrArt',
libChapoArt = '$libChapoArt', 
libAccrochArt = '$libAccrochArt',
parag1Art = '$parag1Art', 
libSsTitr1Art = '$libSsTitr1Art',
parag2Art = '$parag2Art',
libSsTitr2Art = '$libSsTitr2Art',
parag3Art = '$parag3Art',
libConclArt = '$libConclArt', 
urlPhotArt = '$nom_image', 
numThem = '$numThem'";

$where_num = "numArt = '$numArt'";
$table_art = "ARTICLE";

// Mise à jour de l'article
sql_update($table_art, $set_art, $where_num);

// Suppression des mots-clés existants et réinsertion des nouveaux mots-clés
sql_delete('MOTCLEARTICLE', $where_num);
foreach ($numMotCle as $mot) {
    sql_insert('MOTCLEARTICLE', 'numArt, numMotCle', "$numArt, $mot");
}

// Redirection après la mise à jour
header('Location: ../../views/backend/articles/list.php');
exit;
?>
