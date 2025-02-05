<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['errors'] = [];
    $_SESSION['old'] = $_POST;

    // Récupération des données
    $nomMemb = ctrlSaisies($_POST['nomMemb'] ?? '');
    $prenomMemb = ctrlSaisies($_POST['prenomMemb'] ?? '');
    $pseudoMemb = ctrlSaisies($_POST['pseudoMemb'] ?? '');
    $passMemb = $_POST['passMemb'] ?? '';
    $passMemb2 = $_POST['passMemb2'] ?? '';
    $eMailMemb = ctrlSaisies($_POST['eMailMemb'] ?? '');
    $eMailMemb2 = ctrlSaisies($_POST['eMailMemb2'] ?? '');
    $accordMemb = isset($_POST['accordMemb']) ? 1 : 0; 
    $numStat = 3;

    // Validation pseudo
    if (strlen($pseudoMemb) < 6 || strlen($pseudoMemb) > 70) {
        $_SESSION['errors'][] = 'Le pseudo doit contenir entre 6 et 70 caractères';
    } elseif (!empty(sql_select('MEMBRE', 'pseudoMemb', "pseudoMemb = '$pseudoMemb'"))) {
        $_SESSION['errors'][] = 'Pseudo déjà utilisé';
    }

    // Validation mot de passe
    if (strlen($passMemb) < 8) {
        $_SESSION['errors'][] = 'Le mot de passe doit contenir au moins 8 caractères';
    } elseif (!preg_match('/[A-Z]/', $passMemb) || 
             !preg_match('/[a-z]/', $passMemb) || 
             !preg_match('/[0-9]/', $passMemb)) {
        $_SESSION['errors'][] = 'Le mot de passe doit contenir une majuscule, une minuscule et un chiffre';
    } elseif ($passMemb !== $passMemb2) {
        $_SESSION['errors'][] = 'Les mots de passe ne correspondent pas';
    }

    // Validation email
    if (!filter_var($eMailMemb, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = 'Email invalide';
    } elseif ($eMailMemb !== $eMailMemb2) {
        $_SESSION['errors'][] = 'Les emails ne correspondent pas';
    } elseif (!empty(sql_select('MEMBRE', 'eMailMemb', "eMailMemb = '$eMailMemb'"))) {
        $_SESSION['errors'][] = 'Email déjà utilisé';
    }

    // Validation accord
    if ($accordMemb !== 1) {
        $_SESSION['errors'][] = 'Vous devez accepter les conditions d\'utilisation';
    }

    // Si aucune erreur
    if (empty($_SESSION['errors'])) {
        try {
            $hashedPass = password_hash($passMemb, PASSWORD_DEFAULT);
            $dtCreaMemb = date('Y-m-d H:i:s');

            sql_insert(
                'MEMBRE',
                'nomMemb, prenomMemb, pseudoMemb, passMemb, eMailMemb, dtCreaMemb, accordMemb, numStat',
                "'$nomMemb','$prenomMemb','$pseudoMemb','$hashedPass','$eMailMemb','$dtCreaMemb','$accordMemb','$numStat'"
            );

            $_SESSION['success'] = 'Inscription réussie !';
            header('Location: ../../../views/backend/security/login.php');
            exit();
        } catch (Exception $e) {
            $_SESSION['errors'][] = 'Erreur technique : ' . $e->getMessage();
        }
    }

    // Redirection en cas d'erreur
    header('Location: ../../../views/backend/security/signup.php');
    exit();
}