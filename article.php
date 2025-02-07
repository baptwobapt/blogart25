<?php
require_once 'header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/ctrlSaisies.php';

session_start(); 

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

$article = $articleData[0];

// Récupération des statistiques likes/dislikes
$likeCount = sql_select("LIKEART", "COUNT(*) as count", "numArt = $numArt AND likeA = 1")[0]['count'] ?? 0;
$dislikeCount = sql_select("LIKEART", "COUNT(*) as count", "numArt = $numArt AND likeA = 0")[0]['count'] ?? 0;

// Vérification du vote de l'utilisateur
$userVote = null;
$libCom = isset($_POST['libCom']) ? ($_POST['libCom']) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = "Vous devez être connecté pour ajouter un commentaire ou un like.";
        header("Location: " . ROOT_URL . "/views/backend/security/login.php");
        exit();
    }

    // Vérifie si c'est un like/dislike ou un commentaire
    if (isset($_POST['libCom'])) {
        // Récupérer l'ID du membre connecté et les autres données
        $numMemb = $_SESSION['user_id'];
        $libCom = ($_POST['libCom']);
        $numArt = (int)$_POST['numArt'];
        if (!empty($libCom) && !empty($numArt) && !empty($numMemb)) {
            sql_insert('comment', 'libCom, numArt, numMemb', "'$libCom', '$numArt', '$numMemb'");
            echo "<p style='color: green;'>Commentaire ajouté avec succès !</p>";
        } else {
            echo "<p style='color: red;'>Erreur : tous les champs doivent être remplis correctement.</p>";
        }
    } else {

    
        // Le reste du code existant pour le traitement du like...
        $numMemb = $_SESSION['user_id'];
        $likeA = (int)$_POST['likeA'];

        // Vérifier si l'utilisateur a déjà voté
        $existingVote = sql_select("LIKEART", "*", "numArt = $numArt AND numMemb = $numMemb");

        if (!empty($existingVote)) {
            // Mettre à jour le vote
            sql_update("LIKEART", "likeA = $likeA", "numArt = $numArt AND numMemb = $numMemb");
        } else {
            // Insérer un nouveau vote
            sql_insert("LIKEART", "numArt, numMemb, likeA", "'$numArt', '$numMemb', '$likeA'");
        }

        // Recharger la page pour mettre à jour le nombre de likes/dislikes
        header("Location: article.php?numArt=$numArt");
        exit();
    }
}



// Récupérer l'article actuel avec ses commentaires
$numArt = $_GET['numArt']; // Assure-toi d'avoir l'ID de l'article dans l'URL
$comments = sql_select("comment c 
                        INNER JOIN membre m ON c.numMemb = m.numMemb 
                        WHERE c.numArt = $numArt 
                        AND c.delLogiq = 0", 
                        "c.libCom, c.dtCreaCom, m.pseudoMemb");
$comments = sql_select("comment c 
                        INNER JOIN membre m ON c.numMemb = m.numMemb 
                        WHERE c.numArt = $numArt 
                        AND c.delLogiq = 0
                        AND c.attModOK = 1", 
                        "c.libCom, c.dtCreaCom, m.pseudoMemb");
// Afficher l'article et ses commentaires
$article = sql_select("article", "*", "numArt = $numArt")[0];





// Vérification du vote de l'utilisateur
$userVote = null;
if (isset($_SESSION['user_id'])) {
    $numMemb = $_SESSION['user_id'];
    $userVoteData = sql_select("LIKEART", "likeA", "numArt = $numArt AND numMemb = $numMemb");
    $userVote = !empty($userVoteData) ? $userVoteData[0]['likeA'] : null;
}
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
            <?php echo ($article['libTitrArt']); ?>
        </h1>
        <h2 class="soustitre">
            <?php echo ($article['dtCreaArt']); ?> <br> Lecture 2 min
        </h2>
    </div>

    <section>
        <h2 class="carre">
            <?php echo ($article['libChapoArt']); ?> 
        </h2>

        <div class="containerarticle">
            <div class="section-left">
                <div class="contenu">
                    <article>
                        <h2 class="phraseaccroche">
                            <?php echo ($article['libAccrochArt']); ?> 
                        </h2>
                        <p class="paragraphe">
                            <?php echo ($article['parag1Art']); ?> 
                        </p>
                        <img class="image2" src="<?php echo ROOT_URL . '/src/uploads/' . ($article['urlPhotArt']); ?>" alt="Image article">
                        <p class="petit">
                            © Groupe 05 Blog’Art MMI Bordeaux-Montaigne + Description de l’image 
                        </p>

                        <div class="text-with-line">
                            <?php echo ($article['libSsTitr1Art']); ?> 
                        </div>

                        <p class="paragraphe2">
                            <?php echo ($article['parag2Art']); ?>
                        </p>

                        <div class="text-with-line">
                            <?php echo ($article['libSsTitr2Art']); ?>
                        </div>

                        <p class="paragraphe3">
                            <?php ($article['parag3Art']); ?>
                        </p>

                        <p class="conclusion">
                            <?php echo ($article['libConclArt']); ?>
                        </p>
                    </article>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Ajouter un commentaire</h2>
                        </div>
                        <div class="col-md-12">
                            <!-- Form to create a new motcle -->
                            <form action="article.php?numArt=<?php echo $numArt; ?>" method="post">
                                <div class="champ">
                                    <textarea id="libCom" name="libCom" class="form-control" type="text" required></textarea>
                                </div>
                                <input type="hidden" name="numArt" value="<?php echo $numArt; ?>" />
                                <br />
                                <div class="btn-se-connecter">
                                    <button type="submit">Envoyer</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Affichage des commentaires -->
                            <h2>Commentaires</h2>
                            <?php if (!empty($comments)): ?>
                                <ul >
                                    <?php foreach ($comments as $comment): ?>
                                        <div class="commentairesaf">
                                            <li class="list-group-item">
                                            <span class="pseudo"><?php echo ($comment['pseudoMemb']); ?></span> 
                                            a écrit le 
                                            <span class="date"><?php echo ($comment['dtCreaCom']); ?> :</span>
                                            <p class="commentaire"><?php echo nl2br(($comment['libCom'])); ?></p>

                                            </li>
                                        </div>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>Il n'y a pas encore de commentaires pour cet article.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-right">
                <h2>Autres articles</h2>
                <?php
                $randomArticles = sql_select("ARTICLE", "*", "1=1 ORDER BY RAND() LIMIT 3");

                if (!empty($randomArticles)):
                    foreach ($randomArticles as $randomArticle): ?>
                        <div class="random-article">
                            <img class="imagedroite" src="<?php echo ROOT_URL . '/src/uploads/' . ($randomArticle['urlPhotArt']); ?>" alt="Image article">
                            <h2 class="titredroite">
                                <?php echo ($randomArticle['libTitrArt']); ?>
                            </h2>
                            <p class="txtdroite">
                                <?php echo ($randomArticle['libChapoArt']); ?>
                            </p>
                            <a href="article.php?numArt=<?php echo $randomArticle['numArt']; ?>" class="clickable-text">Lire l'article →</a>
                        </div>
                    <?php endforeach;
                else: ?>
                    <p>Aucun article disponible.</p>
                <?php endif; ?>
                <div class="container likes-section">
                    <h2>Évaluer cet article</h2>
                    <div class="vote-buttons">
                        <form action="article.php?numArt=<?php echo $numArt; ?>" method="post">
                            <input type="hidden" name="numArt" value="<?php echo $numArt; ?>">
                            <input type="hidden" name="likeA" value="1">
                            <button type="submit" class="btn-vote <?php echo $userVote === 1 ? 'active-like' : ''; ?>">
                                <img src="<?php echo ROOT_URL; ?>/src/images/pnglike.png" alt="Like">
                                <h3><?php echo $likeCount; ?></h3>
                            </button>
                        </form>

                        <!-- Formulaire Dislike -->
                        <form action="article.php?numArt=<?php echo $numArt; ?>" method="post">
                            <input type="hidden" name="numArt" value="<?php echo $numArt; ?>">
                            <input type="hidden" name="likeA" value="0">
                            <button type="submit" class="btn-vote <?php echo $userVote === 0 ? 'active-dislike' : ''; ?>">
                                <img src="<?php echo ROOT_URL; ?>/src/images/pngdislike.png" alt="Dislike">
                                <h3><?php echo $dislikeCount; ?></h3>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>