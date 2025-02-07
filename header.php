<?php
session_start();
$pseudo = isset($_SESSION['pseudoMemb']) ? $_SESSION['pseudoMemb'] : null;
$numStat = isset($_SESSION['numStat']) ? $_SESSION['numStat'] : 3;    
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/ctrlSaisies.php';


// Load config
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog'Art</title>
    <!-- Load CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <link href="<?php echo ROOT_URL . "/"?>src/css/font.css" rel="stylesheet"/>
    <link href="<?php echo ROOT_URL . "/"?>src/css/style.css" rel="stylesheet"/>
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/x-icon" href="src/images/article.png" />
  
</head>


<body>
<!--
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Blog'Art 25</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="header-left">
          <div class="logo-header">
              <a href="actualites.html"><img src="images/bon_logo/Logo.svg" alt="logo"></a>
          </div>
      </div>-->
      <section id="menu">
        <div class="header-left">
            <div class="logo-header">
              <a href="/"><img src="/src/images/bon_logo/Logo.svg" alt="logo"></a>
            </div>
        </div>
        <ul><li><a href="/actualites.php">Actualités</a></li></ul>
        <div class="header-right">
            <nav>
                <ul>
                  <!--<form class="d-flex me-2" role="search">
                      <input class="form-control me-2" type="search" placeholder="Rechercher sur le site…" aria-label="Search">
                  </form>-->
                    
                    <?php if ($numStat == '1' || $numStat == '2'): ?>
                        <li><a class="bouton-connexion" href="/views/backend/dashboard.php" role="button">Admin</a></li>
                    <?php endif; ?>
                    <?php if ($pseudo): ?>
                        <h2 class="headerh2" ><span style="text-align:center;"><?php echo htmlspecialchars($pseudo); ?></span></h2>
                        <div class="logged-in">
                          <li>
                              
                              <a class="bouton-deconnexion" href="/api/security/disconnect.php" role="button">Déconnexion</a>
                          </li>
                          <li><a href="#" class="bouton-profil">Profil</a></li>  
                        </div>   
                    <?php else: ?>
                        <li><a href="/views/backend/security/login.php" role="button" class="bouton-connexion">Connexion</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>

    

      </section>

