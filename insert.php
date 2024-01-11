<?php
require_once '../Models/databaseConnexion.php';
function clean_input($data) {
    // Fonction pour nettoyer les données entrantes
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    // Utilisation de la classe DatabaseConnection pour obtenir la connexion
    $dbInstance = DatabaseConnection::getInstance();
    $connexion = $dbInstance->getConnection();

    // Récupérer les données soumises via la méthode POST
    $nom = isset($_POST['nom']) ? clean_input($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? clean_input($_POST['prenom']) : '';
    $service = isset($_POST['service']) ? clean_input($_POST['service']) : '';
    $type_select = isset($_POST['type_select']) ? clean_input($_POST['type_select']) : '';
    $_description = isset($_POST['_description']) ? clean_input($_POST['_description']) : '';
    $emplacement = isset($_POST['emplacement']) ? clean_input($_POST['emplacement']) : '';
    $annee_uc = isset($_POST['annee_uc']) ? clean_input($_POST['annee_uc']) : '';

    // Préparation de la requête SQL pour insérer les données
    $stmt = $connexion->prepare("INSERT INTO Materiel (nom, prenom, service, type_select, _description, emplacement, annee_uc) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Erreur de préparation de la requête : " . $connexion->error);
    }

    // Liaison des paramètres pour la requête
    $stmt->bind_param("ssssssi", $nom, $prenom, $service, $type_select, $_description, $emplacement, $annee_uc);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Redirection vers une autre page si nécessaire
       header("Location: ../Views/parcView.php");
       exit;
    } else {
        throw new Exception("Erreur : " . $stmt->error);
    }

    // Fermeture du statement et de la connexion
    $stmt->close();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
