<?php 
require_once 'header.php';
sql_connect();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Récupérer les articles de la base de données
$article = sql_select("ARTICLE", "*");
?>
<div id="cookie-popup" class="cookie-popup">
    <div class="cookie-content">
        <h3>Politique de Cookies</h3>
        <p>
            Nous utilisons des cookies pour assurer le bon fonctionnement de ce blog sur l'UBB, améliorer votre expérience, personnaliser 
            le contenu et analyser le trafic. Certains cookies sont strictement nécessaires, tandis que d'autres nous aident à mieux comprendre 
            votre navigation.
            <br>
            <br>En cliquant sur “Continuer et accepter”, vous autorisez l'utilisation de tous les cookies. Si vous choisissez “Continuer sans 
            accepter”, vous ne pourrez pas créer de compte. Si vous possèdez déjà un compte, vous devrez le supprimer pour refuser les cookies.
            <br>
            <br>Votre choix sera enregistré pour une durée de 6 mois, mais vous pourrez le modifier à tout moment en accédant aux “Politique 
            de confidentialité” en bas de page.
        </p>
        <div class="cookie-buttons">
            <button id="reject-cookies">Continuer sans accepter</button>                        
            <button id="accept-cookies">Continuer et accepter</button>
        </div>
    </div>

                  
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cookiePopup = document.getElementById("cookie-popup");
        const acceptBtn = document.getElementById("accept-cookies");
        const rejectBtn = document.getElementById("reject-cookies");

        // Vérifier si l'utilisateur a refusé les cookies
        if (localStorage.getItem("cookieConsent") === "rejected" || !localStorage.getItem("cookieConsent")) {
            cookiePopup.style.display = "block";  // Afficher le pop-up si refusé ou pas encore de choix
        }

        // Accepter les cookies
        acceptBtn.addEventListener("click", function () {
            localStorage.setItem("cookieConsent", "accepted");
            document.cookie = "cookieConsent=accepted; path=/; max-age=" + (6 * 30 * 24 * 60 * 60); // Expire après 6 mois
            cookiePopup.style.display = "none";  // Masquer le pop-up après acceptation
        });

        // Refuser les cookies
        rejectBtn.addEventListener("click", function () {
            localStorage.setItem("cookieConsent", "rejected");
            document.cookie = "cookieConsent=rejected; path=/; max-age=" + (6 * 30 * 24 * 60 * 60); // Expire après 6 mois
            cookiePopup.style.display = "none";  // Masquer le pop-up après rejet
        });
    });
</script>
<?php

    require_once 'header.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Mêlées Bordelaises</title>
        <link href="<?php echo ROOT_URL . "/"?>src/css/styleactu.css" rel="stylesheet"/>
        <link href="<?php echo ROOT_URL . "/"?>src/css/style.css" rel="stylesheet"/>
    </head>

    <body>
        <div>

            <div class="image-fixe">
                <img src="src/images/imageacceuil.jpg" alt="Image fixe">
            </div>

            <div>
            <h1 class="article1titre">
                <h1 class="titlehead" >Mêlées Bordelaises</h1>
            </h1>

        </div>
        <h2 class="carre">
                <p class="accroche">Notre blog est une passionnée tribune dédiée à l'univers du rugby, 
                    avec un accent particulier sur l'UBB . Nous partageons les 
                    moments forts de l’équipe, les analyses des matchs, les interviews de joueurs et 
                    tout ce qui touche à l’actualité du club bordelais. Que vous soyez supporter de 
                    longue date ou novice dans ce sport, vous trouverez ici des informations pour 
                    suivre et apprécier le rugby à Bordeaux sous toutes ses facettes.</p>
        </h2>
        <div class="containeractu">



            <section class="articles"> 
                        <?php

                        $randomArticles = sql_select("ARTICLE", "*", "1=1 ORDER BY RAND()");

                        if (!empty($randomArticles)):
                            foreach ($randomArticles as $randomArticle): ?>
                                <div class="art">
                                    <div class="random-article">
                                        <img class="imagedroite" src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($randomArticle['urlPhotArt']); ?>" alt="Image article">
                                        <h2 class="titredroite">
                                            <?php echo htmlspecialchars($randomArticle['libTitrArt']); ?>
                                        </h2>
                                        <p class="txtdroite">                               
                                            <?php echo substr($randomArticle['libChapoArt'], 0, 100) . (strlen($randomArticle['libChapoArt']) > 100 ? '...' : ''); ?></td>
                                        </p>
                                        <a href="article.php?numArt=<?php echo $randomArticle['numArt']; ?>" class="clickable-text">Lire l'article →</a>
                                    </div>
                                </div>
                            <?php endforeach;
                        else: ?>
                            <p>Aucun article disponible.</p>
                        <?php endif; ?>
                    </div>                    
                </a>
                
            </section>
        </div>
    </body>
</html>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>
