<?php
include '../../../header.php'; // contains the header and call to config.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/redirec.php';

//Load all articles
$articles = sql_select("ARTICLE", "*");
$keywords = sql_select("MOTCLE", "*");
$keywordsart = sql_select("MOTCLEARTICLE", "*");
$thematiques = sql_select("THEMATIQUE", "*");
?>

<!-- Bootstrap default layout to display all articles in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Articles</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Titre</th>
                        <th>Chapeau</th>
                        <th>Accroche</th>
                        <th>Mots-clés</th>
                        <th>Thématique</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article) { 
                        $numArt = $article['numArt']; // QUEL ARTICLE NUM EST-IL QUESTION?
                        $listMot = sql_select('ARTICLE
                        INNER JOIN MOTCLEARTICLE ON article.numArt = motclearticle.numArt
                        INNER JOIN motcle ON motclearticle.numMotCle = motcle.numMotCle', 'article.numArt, libMotCle', "article.numArt = '$numArt'");
                        ?>
                        <tr>
                            <td><?php echo $article['numArt']; ?></td>
                            <td><?php echo $article['dtCreaArt']; ?></td>
                            <td><?php echo $article['libTitrArt']; ?></td>
                            <td style="max-width: 400px; white-space: wrap; overflow: hidden; text-overflow: ellipsis;">
                            <?php echo substr($article['libChapoArt'], 0, 100) . (strlen($article['libChapoArt']) > 100 ? '...' : ''); ?></td>
                            <td style="max-width: 400px; white-space: wrap; overflow: hidden; text-overflow: ellipsis;">
                            <?php echo $article['libAccrochArt']; ?></td>
                            <td>
                                <?php 
                                foreach ($keywordsart as $keywordart) { 
                                    if ($keywordart['numArt'] == $article['numArt']) {
                                        foreach ($keywords as $keyword) {
                                            if ($keyword['numMotCle'] == $keywordart['numMotCle']) {
                                                echo $keyword['libMotCle'] . "<br>"; 
                                            }
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                            <?php
                                foreach ($thematiques as $thematique) { 
                                    if ($thematique['numThem'] == $article['numThem']) { 
                                        echo $thematique['libThem'];
                                        break; 
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a href="edit.php?numArt=<?php echo($article['numArt']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numArt=<?php echo($article['numArt']); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="create.php" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
