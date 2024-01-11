<?php
// Démarrer la session PHP
session_start();

// Détruire la session active
// Cela efface toutes les données de session stockées
session_destroy();

// Rediriger l'utilisateur vers la page d'accueil ou de connexion
// Modifiez le chemin si nécessaire pour correspondre à la structure de votre application
header("location: /projetcaf/public/index.php");
?>
