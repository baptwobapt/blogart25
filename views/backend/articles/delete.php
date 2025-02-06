<?php
include '../../../header.php'; // Inclure le header
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/redirec.php';


// Vérifier si l'ID de l'article est passé en paramètre
if (isset($_GET['numArt'])) {
    $numArt = $_GET['numArt'];

    // Récupérer les informations de l'article
    $article = sql_select("ARTICLE", "*", "numArt = $numArt")[0];

    // Récupérer la thématique de l'article
    $thematique = sql_select("THEMATIQUE", "*", "numThem = " . $article['numThem'])[0];

    // Récupérer les mots-clés associés à l'article
    $keywords = sql_select("MOTCLEARTICLE", "*", "numArt = $numArt");

    // Récupérer les noms des mots-clés
    $keywordsList = [];
    foreach ($keywords as $keyword) {
        $keywordInfo = sql_select("MOTCLE", "*", "numMotCle = " . $keyword['numMotCle'])[0];
        $keywordsList[] = $keywordInfo['libMotCle'];
    }

    // Chemin de l'image
    $imagePath = $_SERVER['DOCUMENT_ROOT'] . "/src/uploads/" . $article['urlPhotArt'];
} 
?>

<!-- Affichage des informations de l'article -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression de l'article</h1>
            <p>Êtes-vous sûr de vouloir supprimer cet article ?</p>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/articles/delete.php' ?>" method="post">
                <!-- Champ caché pour l'ID de l'article -->
                <input type="hidden" name="numArt" value="<?php echo $article['numArt']; ?>">

                <!-- Titre de l'article -->
                <div class="form-group">
                    <label for="libTitrArt">Titre</label>
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text" value="<?php echo $article['libTitrArt']; ?>" disabled>
                </div>

                <!-- Date de création -->
                <div class="form-group">
                    <label for="dtCreaArt">Date de création</label>
                    <input id="dtCreaArt" name="dtCreaArt" class="form-control" type="text" value="<?php echo $article['dtCreaArt']; ?>" disabled>
                </div>

                <!-- Chapeau -->
                <div class="form-group">
                    <label for="libChapoArt">Chapeau</label>
                    <textarea id="libChapoArt" name="libChapoArt" class="form-control" disabled><?php echo $article['libChapoArt']; ?></textarea>
                </div>

                <!-- Accroche -->
                <div class="form-group">
                    <label for="libAccrochArt">Accroche</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text" value="<?php echo $article['libAccrochArt']; ?>" disabled>
                </div>

                <!-- Paragraphes -->
                <div class="form-group">
                    <label for="parag1Art">Paragraphe 1</label>
                    <textarea id="parag1Art" name="parag1Art" class="form-control" disabled><?php echo $article['parag1Art']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="libSsTitr1Art">Sous-titre 1</label>
                    <input id="libSsTitr1Art" name="libSsTitr1Art" class="form-control" type="text" value="<?php echo $article['libSsTitr1Art']; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="parag2Art">Paragraphe 2</label>
                    <textarea id="parag2Art" name="parag2Art" class="form-control" disabled><?php echo $article['parag2Art']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="libSsTitr2Art">Sous-titre 2</label>
                    <input id="libSsTitr2Art" name="libSsTitr2Art" class="form-control" type="text" value="<?php echo $article['libSsTitr2Art']; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="parag3Art">Paragraphe 3</label>
                    <textarea id="parag3Art" name="parag3Art" class="form-control" disabled><?php echo $article['parag3Art']; ?></textarea>
                </div>

                <!-- Conclusion -->
                <div class="form-group">
                    <label for="libConclArt">Conclusion</label>
                    <textarea id="libConclArt" name="libConclArt" class="form-control" disabled><?php echo $article['libConclArt']; ?></textarea>
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="image">Image</label>
                    <img src="<?php echo ROOT_URL . '/src/uploads/' . $article['urlPhotArt']; ?>" alt="Image de l'article" style="max-width: 200px;">
                </div>

                <!-- Thématique -->
                <div class="form-group">
                    <label for="numThem">Thématique</label>
                    <select id="numThem" name="numThem" class="form-control" disabled>
                        <option value="<?php echo $thematique['numThem']; ?>"><?php echo $thematique['libThem']; ?></option>
                    </select>
                </div>

                <!-- Mots-clés -->
                <div class="form-group">
                    <label for="keywords">Mots-clés</label>
                    <input id="keywords" name="keywords" class="form-control" type="text" value="<?php echo implode(', ', $keywordsList); ?>" disabled>
                </div>

                <!-- Boutons de confirmation -->
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Retour à la liste</a>
                    <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                </div>
            </form>
        </div>
    </div>
</div>

