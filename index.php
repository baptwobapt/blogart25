<?php 
require_once 'header.php';
sql_connect();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Récupérer les articles de la base de données
$article = sql_select("ARTICLE", "*");
?>

<main class="container bg-white">
    <div class="row position-relative">
        <div class="col mt-4">
            <img src="src/images/pont-pierre.jpg" alt="Pont de Pierre" style="width: 100%; position: relative; border-radius: 15px;">
        </div>    
        <h1 class="text-center position-absolute top-50 start-50 translate-middle text-white" style="z-index: 1; font-size:5vw;">LES GARDIENS DE LA GARONNE</h1>    </div>    
    </div>
    <div class="row">
        <!-- Article à la une (titre) -->
        <div class="col-md-6">
            <div class="p-4 p-md-5 mb-4 pe-3">
                <h1 class="display-4">
                    <?php echo $article ? htmlspecialchars($article[0]['libTitrArt']) : "Aucun article trouvé."; ?>
                </h1>
                <!-- Article à la une (chapô) -->
                <p class="lead my-3">
                    <?php echo $article ? htmlspecialchars($article[0]['libChapoArt']) : "Aucun article trouvé."; ?>
                </p>
                <a href="/views/frontend/articles/article?id=<?php echo $article[0]['numArt']; ?>" class="text-body-emphasis fw-bold">Lire la suite...</a>
            </div>
        </div>
        <!-- Article à la une (image) -->
        <div class="col-md-6 d-flex align-items-center pe-5">
            <div class="w-100 d-flex justify-content-center align-items-center">
                <img src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($article[3]['urlPhotArt']); ?>" alt="Image actuelle" style="max-height: 100%; max-width: 100%;">
            </div>
        </div>
    </div>

    <!-- Articles suivants -->
    <div class="row bg-primary bg-opacity-10" style="border-radius: 15px;">
        <?php for ($i = 1; $i <= 2; $i++) { if (isset($article[$i])) { ?>
        <div class="col-md-6 p-4 p-md-5 mb-4 pe-3">
            <div class="row g-0 border rounded flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-md-12 p-4 d-flex flex-column position-static">
                    <h3 class="mb-3"><?php echo htmlspecialchars($article[$i]['libTitrArt']); ?></h3>
                    <p class="card-text mb-auto"><?php echo htmlspecialchars($article[$i]['libChapoArt']); ?></p>
                    <a href="views/frontend/articles/article?id=<?php echo $article[$i]['numArt']; ?>" class="text-body-emphasis fw-bold">Lire la suite...</a>
                    </div>
                <div class="col-md-12 px-3">
                    <div class="h-100 d-flex justify-content-center align-items-center rounded">
                        <img src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($article[$i]['urlPhotArt']); ?>" 
                            alt="Image actuelle" 
                            class="img-fluid rounded" 
                            style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
        <?php }} ?>
    </div>

    <!-- Dernier article -->
    <?php if (isset($article[3])) { ?>
    <div class="row">
        <div class="col-md-6 d-flex align-items-center px-5">
            <div class="w-100 d-flex justify-content-center align-items-center">
                <img src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($article[3]['urlPhotArt']); ?>" alt="Image actuelle" style="max-height: 100%; max-width: 100%;">
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 p-md-5 mb-4">
                <h1 class="display-4"><?php echo htmlspecialchars($article[3]['libTitrArt']); ?></h1>
                <p class="lead my-3"><?php echo htmlspecialchars($article[3]['libChapoArt']); ?></p>
                <a href="views/frontend/articles/article?id=<?php echo $article[3]['numArt']; ?>" class="text-body-emphasis fw-bold">Lire la suite...</a>
            </div>
        </div>
    </div>
    <?php } ?>
</main>
<?php require_once 'footer.php'; ?>  
