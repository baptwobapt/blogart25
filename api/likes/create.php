<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Nettoyer les données
$numMemb = ctrlSaisies($_POST['numMemb']);
$numArt = ctrlSaisies($_POST['numArt']);
$likeA = ctrlSaisies($_POST['likeA']);

// Validation de likeA
if ($likeA !== "1" && $likeA !== "0") {
    die("Erreur : valeur de like invalide.");
}
$likeA = (int)$likeA;

// Vérifier l'existence du like
$existingLike = sql_select('LIKEART', '*', "numMemb = $numMemb AND numArt = $numArt");

if ($existingLike) {
    sql_update('LIKEART', "likeA = $likeA", "numMemb = $numMemb AND numArt = $numArt");
} else {
    sql_insert('LIKEART', 'numMemb, numArt, likeA', "$numMemb, $numArt, $likeA");
}

// Redirection personnalisée
$redirectUrl = isset($_POST['redirect_to']) ? $_POST['redirect_to'] : '../../views/backend/likes/list.php';
header("Location: $redirectUrl");
exit();
?>