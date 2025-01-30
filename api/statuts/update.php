<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numStat = ctrlSaisies($_POST['numStat']);
$libStat = ctrlSaisies($_POST['libStat']);

//sql_delete('STATUT', "numStat = $numStat");
sql_update(table: 'STATUT', attributs: 'libStat = "'.$libStat.'"' , where: "numStat = $numStat");


header(header: 'Location: ../../views/backend/statuts/list.php');