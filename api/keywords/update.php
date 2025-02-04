<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numMotCle = ctrlSaisies($_POST['numMotCle']);
$libMotCle = ctrlSaisies($_POST['libMotCle']);

//sql_delete('STATUT', "numMotCle = $numMotCle");
sql_update(table: 'MOTCLE', attributs: 'libMotCle = "'.$libMotCle.'"' , where: "numMotCle = $numMotCle");


header(header: 'Location: ../../views/backend/keywords/list.php');