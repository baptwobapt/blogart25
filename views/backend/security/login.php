<?php


session_start();
include '../../../header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../../functions/ctrlSaisies.php';

// Ajout d'un message d'erreur si les cookies ne sont pas acceptés

session_start();

// Vérifier si l'utilisateur a refusé les cookies
if (isset($_COOKIE['cookieConsent']) && $_COOKIE['cookieConsent'] === "rejected") {
    header("Location: " . ROOT_URL . "/index.php");
    exit();
}


$success = $_SESSION['success'] ?? null;
$errorPseudo = $errorPassword = "";
$pseudo = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = ctrlSaisies($_POST['pseudo']);
    $password = ctrlSaisies($_POST['password']);

    if (empty($pseudo)) {
        $errorPseudo = "Le pseudo est requis.";
    }

    if (empty($password)) {
        $errorPassword = "Le mot de passe est requis.";
    }

    if (empty($errorPseudo) && empty($errorPassword)) {
        // Vérifier si l'utilisateur existe
        $user = sql_select("MEMBRE", "*", "pseudoMemb = '$pseudo'");

        if ($user && password_verify($password, $user[0]['passMemb'])) {
            // Connexion réussie
            $_SESSION['user_id'] = $user[0]['numMemb'];
            $_SESSION['pseudoMemb'] = $user[0]['pseudoMemb'];
            $_SESSION['numStat'] = $user[0]['numStat']; // ✅ Stocker le statut

            header("Location: " . ROOT_URL . "/index.php");
            exit();
        } else {
            $errorPassword = "Pseudo ou mot de passe incorrect.";
        }
    }
}
?>

<main>

    <h1 class="text-center">Se connecter</h1>
    <?php if ($success): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
        <?php unset($_SESSION['error']); ?> <!-- Efface le message après affichage -->
    <?php endif; ?>

    
    <form action="" method="post">

        <div class="collumnslog">
        <!-- Pseudo -->
            <div class="champ">
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" value="<?= htmlspecialchars($pseudo) ?>" required>
                <?php if (!empty($errorPseudo)): ?>
                    <div class="alert alert-danger mt-2"><?= $errorPseudo ?></div>
                <?php endif; ?>
            </div>

            <!-- Mot de passe -->
            <div class="champ">
                <label for="password">Mot de passe :</label>
                <input type="password" id="mdp" name="password" required>
                <div class="afficher-mdp">
                    <input type="checkbox" id="showPassword" onclick="myFunction()">
                    <label for="showPassword">Afficher mot de passe</label>
                </div>
                <?php if (!empty($errorPassword)): ?>
                    <div class="alert alert-danger mt-2"><?= $errorPassword ?></div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Boutons -->
        <div class="btn-se-connecter">
            <button type="submit">Se connecter</button>
            <a  href="/views/backend/security/mdpoublié.php" class="link">Mot de passe oublié ?</a>
        </div>

        <p>Nouveau chez Mêlées Bordelaises ? <br>
            <a href="/views/backend/security/signup.php" class="link">Créez un compte</a>
        </p>
    </form>
</main>

<script>
    function myFunction() {
        var x = document.getElementById("mdp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

