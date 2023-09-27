<?php
require_once('config.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$num_isiac = $_POST['num_isiac'];
$nom = $_POST['nom'];
$_description = $_POST['_description'];
$emplacement = $_POST['emplacement'];
$annee_uc = $_POST['annee_uc'];

$stmt = $conn->prepare("INSERT INTO materiel (num_isiac, nom, _description, emplacement, annee_uc) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $num_isiac, $nom, $_description, $emplacement, $annee_uc);

if ($stmt->execute()) {
    header("Location: parc.php");
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
