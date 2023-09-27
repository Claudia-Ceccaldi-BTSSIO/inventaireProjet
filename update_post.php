<?php
require_once('config.php');


$id = $_POST['id'];
$num_isiac = $_POST['num_isiac'];
$nom = $_POST['nom'];
$_description = $_POST['_description'];
$emplacement = $_POST['emplacement'];
$annee_uc = $_POST['annee_uc'];

$stmt = $conn->prepare("UPDATE materiel SET num_isiac=?, nom=?, _description=?, emplacement=?, annee_uc=? WHERE id=?");
$stmt->bind_param("sssisi", $num_isiac, $nom, $_description, $emplacement, $annee_uc, $id);

if ($stmt->execute()) {
    header("Location: parc.php");
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
