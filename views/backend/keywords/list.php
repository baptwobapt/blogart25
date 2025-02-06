<?php
include '../../../header.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/redirec.php';

//Load all statuts
$keywords = sql_select("MOTCLE", "*");
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Mots-clés</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom des Mots-clés</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($keywords as $keyword) { ?>
                        <tr>
                            <td><?php echo $keyword['numMotCle']; ?></td>
                            <td><?php echo $keyword['libMotCle']; ?></td>
                            <td>
                                <a href="edit.php?numMotCle=<?php echo($keyword['numMotCle']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numMotCle=<?php echo($keyword['numMotCle']); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="create.php" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
