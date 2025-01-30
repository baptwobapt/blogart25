<!-- Bootstrap form to delete a statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Statut</h1>
            <?php if ($ifnumMotCleUsed) : ?>
                <div class="alert alert-danger">
                    <?php if ($countnumMotCle > 1) : ?>
                        ⚠ Impossible de supprimer ce statut car il est utilisé par <?php echo $countnumMotCle; ?> membres.
                    <?php else : ?>
                        ⚠ Impossible de supprimer ce statut car il est utilisé par <?php echo $countnumMotCle; ?> membre.
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/statuts/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="libMotCle">Nom du statut</label>
                    <input id="numMotCle" name="numMotCle" class="form-control" style="display: none" type="text" value="<?php echo($numMotCle); ?>" readonly />
                    <input id="libMotCle" name="libMotCle" class="form-control" type="text" value="<?php echo($libMotCle); ?>" readonly disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Retour à la liste</a>
                    <button type="submit" class="btn btn-danger" <?php echo ($ifnumMotCleUsed ? 'disabled' : ''); ?>>
                        Confirmer delete ?
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>