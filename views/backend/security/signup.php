<?php
session_start();
include '../../../header.php';

// Récupération des données de session
$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? null;
$old = $_SESSION['old'] ?? [];

// Nettoyage des données de session après récupération
unset($_SESSION['errors'], $_SESSION['success'], $_SESSION['old']);
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="mb-4">Création de compte</h1>

            <?php if ($success): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <h5>Erreurs à corriger :</h5>
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo ROOT_URL . '/api/security/signup.php' ?>" method="post">
                <!-- Nom -->
                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" 
                           class="form-control" 
                           name="nomMemb" 
                           value="<?= htmlspecialchars($old['nomMemb'] ?? '') ?>"
                           required>
                </div>

                <!-- Prénom -->
                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" 
                           class="form-control" 
                           name="prenomMemb" 
                           value="<?= htmlspecialchars($old['prenomMemb'] ?? '') ?>"
                           required>
                </div>

                <!-- Pseudo -->
                <div class="mb-3">
                    <label class="form-label">Pseudo</label>
                    <input type="text" 
                           class="form-control" 
                           name="pseudoMemb" 
                           value="<?= htmlspecialchars($old['pseudoMemb'] ?? '') ?>"
                           required>
                    <small class="form-text text-muted">6 à 70 caractères</small>
                </div>

                <!-- Mot de passe -->
                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" 
                           class="form-control" 
                           name="passMemb" 
                           id="passMemb"
                           required>
                    <small class="form-text text-muted">8-15 caractères avec majuscule, minuscule et chiffre</small>
                </div>
                <input type="checkbox" onclick="togglePassword('passMemb')"> Afficher Mot de passe

                <!-- Confirmation mot de passe -->
                <div class="mb-3">
                    <label class="form-label">Confirmer le mot de passe</label>
                    <input type="password" 
                           class="form-control" 
                           name="passMemb2" 
                           id="passMemb2"
                           required>
                </div>
                <input type="checkbox" onclick="togglePassword('passMemb2')"> Afficher Mot de passe

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" 
                           class="form-control" 
                           name="eMailMemb" 
                           value="<?= htmlspecialchars($old['eMailMemb'] ?? '') ?>"
                           required>
                </div>

                <!-- Confirmation Email -->
                <div class="mb-3">
                    <label class="form-label">Confirmer l'email</label>
                    <input type="email" 
                           class="form-control" 
                           name="eMailMemb2" 
                           value="<?= htmlspecialchars($old['eMailMemb2'] ?? '') ?>"
                           required>
                </div>

                <!-- Accord données -->
                <div class="mb-3 form-check">
                <input type="checkbox" 
                    class="form-check-input" 
                    name="accordMemb" 
                    value="1" 
                    <?= isset($old['accordMemb']) ? 'checked' : '' ?>>
                    <label class="form-check-label">J'accepte le stockage de mes données</label>
                </div>

                <!-- Boutons -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="<?= ROOT_URL ?>login.php" class="btn btn-secondary">
                        Déjà un compte ? Se connecter
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Créer le compte
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
        function togglePassword(id) {
            var passMemb = document.getElementById(id);
            if (passMemb.type === "password") {
                passMemb.type = "text";
            } else {
                passMemb.type = "password";
            }
        }
</script> 