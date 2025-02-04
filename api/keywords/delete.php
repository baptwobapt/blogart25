<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numMotCle = ctrlSaisies($_POST['numMotCle']);

// Vérifie si le statut est utilisé
$countnumMotCle = sql_select("MOTCLEARTICLE", "COUNT(*) AS total", "numMotCle = $numMotCle")[0]['total'];

if ($countnumMotCle > 0) {
    // Redirection avec message d'erreur
    header('Location: ../../views/backend/keywords/list.php?error=used');
    exit;
}

// Si le statut n'est pas utilisé, suppression
sql_delete('MOTCLE', "numMotCle = $numMotCle");

header('Location: ../../views/backend/keywords/list.php?success=deleted');
exit;

?>