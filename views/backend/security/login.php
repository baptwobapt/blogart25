<?php
include '../../../header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../../functions/ctrlSaisies.php';

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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Connexion</h2>
            <form action="" method="post">
                <!-- Pseudo -->
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" class="form-control" value="<?php echo htmlspecialchars($pseudo); ?>" required>
                    <?php if (!empty($errorPseudo)): ?>
                        <div class="alert alert-danger mt-2"><?php echo $errorPseudo; ?></div>
                    <?php endif; ?>
                </div>
                <br>

                <!-- Mot de passe -->
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <?php if (!empty($errorPassword)): ?>
                        <div class="alert alert-danger mt-2"><?php echo $errorPassword; ?></div>
                    <?php endif; ?>
                </div>
                <br>

                <!-- Bouton de connexion -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>
