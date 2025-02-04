<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numArt = ctrlSaisies($_POST['numArt']);

// Récupérer le chemin de l'image associée à l'article avant de supprimer l'article
$article = sql_select("ARTICLE", "urlPhotArt", "numArt = '$numArt'")[0];
$ancienneImage = $article['urlPhotArt'];

// Spécifier le chemin du dossier des images
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/src/uploads/';

// Supprimer l'image du serveur si elle existe
if ($ancienneImage && file_exists($uploadDir . $ancienneImage)) {
    unlink($uploadDir . $ancienneImage);
}

// Supprimer les mots-clés associés à l'article
sql_delete('MOTCLEARTICLE', "numArt = '$numArt'");

// Supprimer l'article de la base de données
sql_delete('ARTICLE', "numArt = '$numArt'");

// Redirection après la suppression
header('Location: ../../views/backend/articles/list.php');
exit;
?>
