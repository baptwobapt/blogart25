<?php
include '../../../header.php'; // contains the header and call to config.php

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
                            <td><?php echo $statut['numMotCle']; ?></td>
                            <td><?php echo $statut['libMotCle']; ?></td>
                            <td>
                                <a href="edit.php?numMotCle=<?php echo($statut['numMotCle']); ?>" class="btn btn-primary">Edit</a>
                                
                                <?php if ($statut['numMotCle'] == 1) { ?>
                                    <a href="delete.php?numMotCle=<?php echo($statut['numMotCle']); ?>" class="btn btn-danger disabled">Delete</a>
                                <?php } else { ?>
                                    <a href="delete.php?numMotCle=<?php echo($statut['numMotCle']); ?>" class="btn btn-danger">Delete</a>
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
<?php
include '../../../footer.php'; // contains the footer
