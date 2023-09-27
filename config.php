<?php
// Paramètres de connexion à la base de données
$servername = 'localhost';
$username = 'defi';
$password = 'microsoft47';
$database = 'parccaf47';

// Connexion à la base de données en utilisant les requêtes préparées
$connexion = new mysqli($servername, $username, $password, $database);

// Vérifier si la connexion a réussi
if ($connexion->connect_error) {
    die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
}

// Configuration des caractères d'encodage pour éviter les problèmes d'encodage
$connexion->set_charset('utf8mb4');

// Vous pouvez également activer le mode strict pour les requêtes
// Cela peut aider à éviter des erreurs potentielles
$connexion->query("SET sql_mode = 'STRICT_ALL_TABLES';");
