<?php
require_once 'footer.php';
require_once 'header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Connexion à la base de données
sql_connect();

// Vérification de la présence de numArt
if (!isset($_GET['numArt']) || empty($_GET['numArt'])) {
    die("Aucun article sélectionné.");
}

$numArt = (int)$_GET['numArt'];
$articleData = sql_select("ARTICLE", "*", "numArt = $numArt");

// Vérification si l'article existe
if (empty($articleData)) {
    die("Article non trouvé.");
}

$article = $articleData[0];
$thematiques = sql_select("THEMATIQUE", "*");
$keywords = sql_select("MOTCLE", "*");
$selectedKeywords = sql_select("MOTCLEARTICLE", "*", "numArt = $numArt");

// Liste des mots-clés liés à l'article
$listMot = sql_select(
    'ARTICLE
    INNER JOIN MOTCLEARTICLE ON ARTICLE.numArt = MOTCLEARTICLE.numArt
    INNER JOIN MOTCLE ON MOTCLEARTICLE.numMotCle = MOTCLE.numMotCle',
    'ARTICLE.numArt, libMotCle',
    "ARTICLE.numArt = '$numArt'"
);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo ROOT_URL; ?>/src/css/font.css" rel="stylesheet"/>
    <link href="<?php echo ROOT_URL; ?>/src/css/stylearticle.css" rel="stylesheet"/>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="image-fixe">
        <img src="ubb site/image/ubb image.jpg" alt="Image fixe">
    </div>

    <div>
        <h1 class="article1titre">
            <?php echo htmlspecialchars($article['libTitrArt']); ?>
        </h1>
        <h2 class="soustitre">
            <?php echo htmlspecialchars($article['dtCreaArt']); ?> <br> Lecture 2 min
        </h2>
    </div>

    <section>
        <h2 class="carre">
            <?php echo htmlspecialchars($article['libChapoArt']); ?> 
        </h2>

        <div class="containerarticle">
            <div class="section-left">
                <div class="contenu">
                    <article>
                        <h2 class="phraseaccroche">
                            <?php echo htmlspecialchars($article['libAccrochArt']); ?> 
                        </h2>
                        <p class="paragraphe">
                            <?php echo htmlspecialchars($article['parag1Art']); ?> 
                        </p>
                        <img class="image2" src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($article['urlPhotArt']); ?>" alt="Image article">
                        <p class="petit">
                            © Groupe 05 Blog’Art MMI Bordeaux-Montaigne + Description de l’image 
                        </p>

                        <div class="text-with-line">
                            <?php echo htmlspecialchars($article['libSsTitr1Art']); ?> 
                        </div>

                        <p class="paragraphe2">
                            <?php echo htmlspecialchars($article['parag2Art']); ?>
                        </p>

                        <div class="text-with-line">
                            <?php echo htmlspecialchars($article['libSsTitr2Art']); ?>
                        </div>

                        <p class="paragraphe3">
                            <?php echo htmlspecialchars($article['parag3Art']); ?>
                        </p>

                        <p class="conclusion">
                            <?php echo htmlspecialchars($article['libConclArt']); ?>
                        </p>
                    </article>
                </div>
            </div>

            <div class="section-right">
                <h2 style="font-size:50px; font-weight:700;">Autres articles</h2>
                <?php
                $randomArticles = sql_select("ARTICLE", "*", "1=1 ORDER BY RAND() LIMIT 3");

                if (!empty($randomArticles)):
                    foreach ($randomArticles as $randomArticle): ?>
                        <div class="random-article">
                            <img class="imagedroite" src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($randomArticle['urlPhotArt']); ?>" alt="Image article">
                            <h2 class="titredroite">
                                <?php echo htmlspecialchars($randomArticle['libTitrArt']); ?>
                            </h2>
                            <p class="txtdroite">
                                <?php echo htmlspecialchars($randomArticle['libChapoArt']); ?>
                            </p>
                            <a href="article.php?numArt=<?php echo $randomArticle['numArt']; ?>" class="clickable-text">Lire l'article →</a>
                        </div>
                    <?php endforeach;
                else: ?>
                    <p>Aucun article disponible.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</body>
</html>
<?php
require_once 'footer.php';
?>