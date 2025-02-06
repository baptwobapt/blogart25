<?php
include '../../../header.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/redirec.php';

//Load all statuts
$statuts = sql_select("STATUT", "*");
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Statuts</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom des statuts</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($statuts as $statut) { ?>
                        <tr>
                            <td><?php echo $statut['numStat']; ?></td>
                            <td><?php echo $statut['libStat']; ?></td>
                            <td>
                                <a href="edit.php?numStat=<?php echo($statut['numStat']); ?>" class="btn btn-primary">Edit</a>
                                
                                <?php if ($statut['numStat'] == 1) { ?>
                                    <a href="delete.php?numStat=<?php echo($statut['numStat']); ?>" class="btn btn-danger disabled">Delete</a>
                                <?php } else { ?>
                                    <a href="delete.php?numStat=<?php echo($statut['numStat']); ?>" class="btn btn-danger">Delete</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="create.php" class="btn btn-success">Create</a>
        </div>
    </div>
</div>

