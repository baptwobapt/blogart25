<?php
include '../../../header.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/redirec.php';

//Load all statuts
$thematiques = sql_select("THEMATIQUE", "*");
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Thematiques</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom des thematiques</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($thematiques as $thematique) { ?>
                        <tr>
                            <td><?php echo $thematique['numThem']; ?></td>
                            <td><?php echo $thematique['libThem']; ?></td>
                            <td>
                                <a href="edit.php?numThem=<?php echo($thematique['numThem']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numThem=<?php echo($thematique['numThem']); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="create.php" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
