<?php

require_once('config.php');


$id = $_GET['id']; // ou $_POST['id'] selon la méthode que vous souhaitez utiliser

$stmt = $connexion->prepare("DELETE FROM materiel WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: parc.php");
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$connexion->close();
