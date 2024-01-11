<?php

// Vérifier si une session PHP est déjà active, sinon en démarrer une
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_user'])) {
    // Si l'utilisateur n'est pas connecté et n'est pas sur la page 'parcView.php',
    // rediriger vers la page d'accueil/connexion
    if (basename($_SERVER['PHP_SELF']) != 'parcView.php') {
        header("Location: ../index.php");
        exit;
    } else {
        // Si l'utilisateur n'est pas connecté mais est sur 'parcView.php', afficher un message
        echo "Vous n'êtes pas connecté ";
    }
}
?>
