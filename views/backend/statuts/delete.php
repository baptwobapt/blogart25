<?php
include '../../../header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/redirec.php';


if (isset($_GET['numStat'])) {
    $numStat = $_GET['numStat'];
    $libStat = sql_select("STATUT", "libStat", "numStat = $numStat")[0]['libStat'];

    // Vérifie si le statut est utilisé par au moins un membre
    $countnumStat = sql_select("MEMBRE", "COUNT(*) AS total", "numStat = $numStat")[0]['total'];
    $ifnumStatUsed = $countnumStat > 0; // true si au moins un membre a ce statut
}
?>

<!-- Bootstrap form to delete a statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Statut</h1>
            <?php if ($ifnumStatUsed) : ?>
                <div class="alert alert-danger">
                    <?php if ($countnumStat > 1) : ?>
                        ⚠ Impossible de supprimer ce statut car il est utilisé par <?php echo $countnumStat; ?> membres.
                    <?php else : ?>
                        ⚠ Impossible de supprimer ce statut car il est utilisé par <?php echo $countnumStat; ?> membre.
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/statuts/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="libStat">Nom du statut</label>
                    <input id="numStat" name="numStat" class="form-control" style="display: none" type="text" value="<?php echo($numStat); ?>" readonly />
                    <input id="libStat" name="libStat" class="form-control" type="text" value="<?php echo($libStat); ?>" readonly disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Retour à la liste</a>
                    <button type="submit" class="btn btn-danger" <?php echo ($ifnumStatUsed ? 'disabled' : ''); ?>>
                        Confirmer delete ?
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
