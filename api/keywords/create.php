<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$libMotCle = ctrlSaisies($_POST['libMotCle']);

sql_insert('STATUT', 'libMotCle', "'$libMotCle'");


header('Location: ../../views/backend/statuts/list.php');