<?php
// Paramètres de connexion à la base de données
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'fichematerielnomade';

// Connexion à la base de données en utilisant les requêtes préparées
$connexion = new mysqli($hostname, $username, $password, $database);

// Vérifie si la connexion a réussi
if ($connexion->connect_error) {
    die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
}

// Configuration des caractères d'encodage pour éviter les problèmes d'encodage
$connexion->set_charset('utf8mb4');

// Active le mode strict pour les requêtes
// Cela peut aider à éviter des erreurs potentielles
$connexion->query("SET sql_mode = 'STRICT_ALL_TABLES';");
?>
