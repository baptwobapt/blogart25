<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numStat = ctrlSaisies($_POST['numStat']);

// Vérifie si le statut est utilisé
$countnumStat = sql_select("MEMBRE", "COUNT(*) AS total", "numStat = $numStat")[0]['total'];

if ($countnumStat > 0) {
    // Redirection avec message d'erreur
    header('Location: ../../views/backend/statuts/list.php?error=used');
    exit;
}

// Si le statut n'est pas utilisé, suppression
sql_delete('STATUT', "numStat = $numStat");

header('Location: ../../views/backend/statuts/list.php?success=deleted');
exit;

?>