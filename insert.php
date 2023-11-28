<?php
// Paramètres de connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'parccaf47';

// Connexion à la base de données en utilisant les requêtes préparées
$connexion = new mysqli($servername, $username, $password, $database);

// Vérifier si la connexion a réussi
if ($connexion->connect_error) {
    die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
}
if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
}
$num_isiac = $_POST['num_isiac'];
$nom = $_POST['nom'];
$_description = $_POST['_description'];
$emplacement = $_POST['emplacement'];
$annee_uc = $_POST['annee_uc'];

$stmt = $connexion->prepare("INSERT INTO materiel (num_isiac, nom, _description, emplacement, annee_uc) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $num_isiac, $nom, $_description, $emplacement, $annee_uc);

if ($stmt->execute()) {
    header("Location: parc.php");
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$connexion->close();
