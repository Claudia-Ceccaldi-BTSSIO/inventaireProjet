<?php
require_once '../Models/databaseConnexion.php';

$dbInstance = DatabaseConnection::getInstance();
$connexion = $dbInstance->getConnection();

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$item = null;
$error_message = "";

// Si vous mettez à jour les informations via un formulaire POST
if (isset($_POST['update']) && isset($_POST['id_materiel'])) {
    $id_materiel = clean_input($_POST['id_materiel']);
    $nom = clean_input($_POST['nom']);
    $prenom = clean_input($_POST['prenom']);
    $service = clean_input($_POST['service']);
    $type_select = clean_input($_POST['type_select']);
    $_description = clean_input($_POST['_description']);
    $emplacement = clean_input($_POST['emplacement']);
    $annee_uc = clean_input($_POST['annee_uc']);

    // Préparation de la requête SQL pour mettre à jour les données
    $stmt = $connexion->prepare("UPDATE Materiel SET nom = ?, prenom = ?, service = ?, type_select = ?, _description = ?, emplacement = ?, annee_uc = ? WHERE id_materiel = ?");
    $stmt->bind_param("ssssssii", $nom, $prenom, $service, $type_select, $_description, $emplacement, $annee_uc, $id_materiel);

    if ($stmt->execute()) {
        header("Location: ../Views/parcView.php"); // Chemin correct pour la redirection
        exit;
    } else {
        $error_message = "Erreur lors de la mise à jour : " . $stmt->error;
    }

    $stmt->close();
}

// Récupérer les informations actuelles de l'élément à modifier si un id est passé via GET
if (isset($_GET['id_materiel'])) {
    $id_materiel = clean_input($_GET['id_materiel']);
    
    // Préparation de la requête SQL pour obtenir les données actuelles
    $stmt = $connexion->prepare("SELECT * FROM Materiel WHERE id_materiel = ?");
    $stmt->bind_param("i", $id_materiel);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
    } else {
        $error_message = "Aucun matériel trouvé avec cet ID.";
    }
    $stmt->close();
}

// Inclusion de la vue
require '../Views/updateView.php';
?>
