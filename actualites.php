<?php

    require_once 'header.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Nos actus | Mêlées Bordelaises</title>
        <link href="<?php echo ROOT_URL . "/"?>src/css/font.css" rel="stylesheet"/>
        <link href="<?php echo ROOT_URL . "/"?>src/css/styleactu.css" rel="stylesheet"/>
        <link href="<?php echo ROOT_URL . "/"?>src/css/style.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
        <div>

            <div class="image-fixe">
                <img src="ubb site/image/ubb image.jpg" alt="Image fixe">
            </div>

            <div>
            <h1 class="article1titre">
                <h1 class="titlehead" >Nos actus</h1>
            </h1>

        </div>
        <h2 class="carre">
                <p class="accroche">Restez à l’affût de toute l’actualité rugbystique à Bordeaux: résultats, interviews, événements et plus encore, tout ce qui fait vibrer l'ovalie Girondine !</p>
        </h2>
        <div class="containeractu">


            <section class="hero-header">
                
                <img src="ubb site/image/fleche-bas.svg" style="filter: invert(1); width:50px; height:50px;">

                <audio id="sound" src="/src/audio/AllerUBB.mp3"></audio>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        let audio = document.getElementById("sound");
                        audio.play().catch(error => {
                            console.log("Lecture automatique bloquée par le navigateur : ", error);
                        });
                    });
                    document.addEventListener("click", function () {
                        let audio = document.getElementById("sound");
                        if (audio.paused) {
                            audio.play();
                        }
                    });
                </script>                    
            </section>

            <section class="articles"> 
                        <?php

                        $randomArticles = sql_select("ARTICLE", "*", "1=1 ORDER BY RAND() LIMIT 3");

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
require_once 'footer.php';
?>