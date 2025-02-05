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
    <link href="src/css/font.css" rel="stylesheet"/>
    <link href="src/css/style.css" rel="stylesheet"/>
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
        <ul><li><a href="#">Actualités</a></li></ul>
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
                        <h2><span style="text-align:center;"><?php echo htmlspecialchars($pseudo); ?></span></h2>
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

<style>


html, body {
    height: 100vh;
    width: 100vw;
    margin: 0;
    padding: 0;
    scroll-behavior: smooth;
    font-family: "Poppins", serif;
    overflow-x: hidden;
    text-align: center; !important;
}
.header-left {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 20px;
}
.header-right {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 20px;

}
.rowlog {
    display: flex;
    flex-direction: row;
    justify-content: center;
    gap: 50px;
    width: 100%;
}
.collumnslog {

    width: 30%;
}

#menu {
    background-color: #67081D;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: "Poppins", serif;
    font-weight: 400;
    font-size: 22px;
    padding: 20px 50px;
    height: 130px;
}

#menu ul {
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 40px;
}

#menu ul li a {
    text-decoration: none;
    color: white;
}
#menu h2 {
    color: white;
    height: 100%;
    margin: 0;
    
}

#menu ul li a:hover {
    transition: 0.3s;
    color: #bd7575;
}

#menu .bouton-connexion {
    color: #67081D;
    background-color: white;
    outline: 2px solid white;
    border-radius: 40px;
    padding: 8px 25px;
    transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

#menu .bouton-connexion:hover {
    color: white;
    background-color: transparent;
}

.logged-in {
    display: flex;
    flex-direction: row;
    justify-content: center;
    gap: 7px;
}

#menu .bouton-deconnexion {
    color: white;
    background-color: transparent;
    outline: 2px solid white;
    border-radius: 40px 2px 2px 40px;
    padding: 8px 25px;
    transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, color 0.3s ease-in-out; /* Ajout de transition pour transformer, couleur et fond */
}

#menu .bouton-deconnexion:hover {
    background-color: white;
    color: #67081D;
}

#menu .bouton-profil {
    color: #67081D;
    background-color: white;
    outline: 2px solid white;
    border-radius: 2px 40px 40px 2px;
    padding: 8px 25px;
    transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

#menu .bouton-profil:hover {
    color: white;
    background-color: transparent;
    outline: 2px solid white;
}

.link {
    text-decoration: none;
    color: #67081D;
}

.link:hover {
    transition: 0.3s;
    text-decoration: underline;
}

ul {

    margin-block-start: 0em;
    margin-block-end: 0em;
    padding-inline-start: 0px;
}
h1 { 
    margin: 80px;
    text-transform: uppercase; !important;
    font-size: 90px; !important;
    text-align: center;
}


/*MISE EN FORME DU FORMULAIRE DE CONTACT*/
form h1 {
    margin: 70px; !important;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.champ {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 50px;
}

.champ label {
    align-self: flex-start;
    font-weight: 500;
    font-size: 18px;
}

.champ input {
    width: 100%;
    font-family: "Poppins", serif;
    border: none;
    border-bottom: 2px solid #cccccc; /* Ajoute uniquement une ligne en bas */
    outline: none; /* Supprime le contour bleu par défaut */
}

input:focus {
    transition: border-color 0.3s ease;
    border-bottom: 2px solid #67081D; 
}

.btn-se-connecter {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 6px;
    margin-bottom: 10px;
}

.btn-se-connecter a {
    font-size: 15px;
}

.btn-se-connecter button {
    color: white;
    background-color: #67081D;
    border: none;
    border-radius: 40px;
    padding: 8px 25px;
    cursor: pointer;
    font-family: "Poppins", serif;
    font-weight: 500;
    font-size: 16px;
}

.btn-se-connecter button:hover {
    transition: 0.3s;
    background: #a3082a;
}

.h1-mdp {
    margin-bottom: 0;
}

form p {
    margin-bottom: 70px;
}

.btn-mdp {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 60px;
    margin-bottom: 40px;
}

.btn-mdp button {
    color: white;
    background-color: #67081D;
    border: none;
    border-radius: 40px;
    padding: 8px 25px;
    cursor: pointer;
    font-family: "Poppins", serif;
    font-weight: 500;
    font-size: 16px;  
}

.btn-mdp button:hover {
    transition: 0.3s;
    background: #a3082a;
}

.afficher-mdp {
    display: flex;
    align-self: flex-start;
    gap: 10px;
    cursor: pointer; 
    white-space: nowrap; 
}

.afficher-mdp label {
    font-size: 16px;
    font-weight:300;
}








h1 {
  font-size: 65px;
  font-weight: bold;
  text-transform: uppercase;
}

/* POPPINS: POLICE CORPS DE TEXTE */
.poppins-thin {
    font-family: "Poppins", serif;
    font-weight: 100;
    font-style: normal;
  }
  
  .poppins-extralight {
    font-family: "Poppins", serif;
    font-weight: 200;
    font-style: normal;
  }
  
  .poppins-light {
    font-family: "Poppins", serif;
    font-weight: 300;
    font-style: normal;
  }
  
  .poppins-regular {
    font-family: "Poppins", serif;
    font-weight: 400;
    font-style: normal;
  }
  
  .poppins-medium {
    font-family: "Poppins", serif;
    font-weight: 500;
    font-style: normal;
  }
  
  .poppins-semibold {
    font-family: "Poppins", serif;
    font-weight: 600;
    font-style: normal;
  }
  
  .poppins-bold {
    font-family: "Poppins", serif;
    font-weight: 700;
    font-style: normal;
  }
  
  .poppins-extrabold {
    font-family: "Poppins", serif;
    font-weight: 800;
    font-style: normal;
  }
  
  .poppins-black {
    font-family: "Poppins", serif;
    font-weight: 900;
    font-style: normal;
  }
  
  .poppins-thin-italic {
    font-family: "Poppins", serif;
    font-weight: 100;
    font-style: italic;
  }
  
  .poppins-extralight-italic {
    font-family: "Poppins", serif;
    font-weight: 200;
    font-style: italic;
  }
  
  .poppins-light-italic {
    font-family: "Poppins", serif;
    font-weight: 300;
    font-style: italic;
  }
  
  .poppins-regular-italic {
    font-family: "Poppins", serif;
    font-weight: 400;
    font-style: italic;
  }
  
  .poppins-medium-italic {
    font-family: "Poppins", serif;
    font-weight: 500;
    font-style: italic;
  }
  
  .poppins-semibold-italic {
    font-family: "Poppins", serif;
    font-weight: 600;
    font-style: italic;
  }
  
  .poppins-bold-italic {
    font-family: "Poppins", serif;
    font-weight: 700;
    font-style: italic;
  }
  
  .poppins-extrabold-italic {
    font-family: "Poppins", serif;
    font-weight: 800;
    font-style: italic;
  }
  
  .poppins-black-italic {
    font-family: "Poppins", serif;
    font-weight: 900;
    font-style: italic;
  }
  
</style>