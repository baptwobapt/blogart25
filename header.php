<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog'Art</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="src/css/style.css" />
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/x-icon" href="src/images/article.png" />
</head>
<?php
session_start();
$pseudo = isset($_SESSION['pseudoMemb']) ? $_SESSION['pseudoMemb'] : null;
$numStat = isset($_SESSION['numStat']) ? $_SESSION['numStat'] : 3;    

// Load config
require_once 'config.php';
?>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Blog'Art 25</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/views/frontend/actors.php">Acteurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/views/frontend/events.php">Evenement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/views/frontend/original.php">Insolite</a>
        </li>

      </ul>
    </div>

    <!-- Zone de droite -->
    <div class="d-flex align-items-center">
      <form class="d-flex me-2" role="search">
          <input class="form-control me-2" type="search" placeholder="Rechercher sur le site…" aria-label="Search">
      </form>

      <!-- Si l'utilisateur est connecté -->
      <?php if ($pseudo): ?>
        <div class="d-flex align-items-center me-3">
          <span class="ms-2 fw-bold"><?php echo htmlspecialchars($pseudo); ?></span>
        </div>
        <a class="btn btn-danger m-1" href="/api/security/disconnect.php" role="button">Déconnexion</a>
      <?php else: ?>

        <a class="btn btn-primary m-1" href="/views/backend/security/login.php" role="button">Login</a>
        <a class="btn btn-dark m-1" href="/views/backend/security/signup.php" role="button">Sign up</a>
      <?php endif; ?>
      <?php if ($numStat == '1' || $numStat == '2'): ?>
        <a class="btn btn-primary" href="/views/backend/dashboard.php" role="button" >Admin</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
