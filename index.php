<?php

require_once '../src/Models/databaseConnexion.php'; // Ce chemin doit être vérifié pour être correct

// Création d'une instance de connexion à la base de données
$dbConnection = DatabaseConnection::getInstance()->getConnection();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application CAF du Lot-et-Garonne</title>
    <base href="http://localhost/projetcaf/">
    <link rel="stylesheet" href="public/assets/css/style_index.css?v=1"><!--le ?v=1 force le navigateur à charger la dernière version !-->
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur l'application de la CAF du Lot-et-Garonne</h1>
        <br>
        <a href="src/Views/attestMatView.php" class="circle-button">Attestation de Mise Disposition de Matériel Nomade</a>
        <br>
        <h2>Inventaire du Matériel Nomade</h2>
        <h3>Comprenant le matériel suivant : </h3>
        <ul class="no-bullets">
       <li>Casques</li>
       <li>Clé USB / Clé Wifi</li>
       <li>Webcam</li> 
       <li>UC de télétravail</li> 
        </ul>
        <div class="button-container">
        <a href="src/Views/loginView.php" class="btn">Connexion</a>
            
        </div>
    </div>
</body>
</html>
