<?php
require_once '../Models/databaseConnexion.php';

// Utilisation de la classe DatabaseConnection pour obtenir la connexion
$dbInstance = DatabaseConnection::getInstance();
$connexion = $dbInstance->getConnection();

try {
    // Vérifier si l'ID du matériel est fourni
    if (isset($_GET['id_materiel'])) {
        $id_materiel = $_GET['id_materiel'];
        
        // Préparer la requête de suppression
        $stmt = $connexion->prepare("DELETE FROM Materiel WHERE id_materiel = ?");
        if (!$stmt) {
            throw new Exception("Erreur de préparation de la requête : " . $connexion->error);
        }
        
        // Lier le paramètre et exécuter la requête
        $stmt->bind_param("i", $id_materiel);
        if ($stmt->execute()) {
            // Redirection vers la page d'aperçu
            header("Location: ../Views/parcView.php");
            exit;
        } else {
            // Gérer l'erreur d'exécution
            throw new Exception("Erreur lors de la suppression : " . $stmt->error);
        }
        
        // Fermer le statement
        $stmt->close();
    } else {
        // Gérer l'erreur si aucun ID n'est fourni
        throw new Exception("Aucun ID de matériel fourni.");
    }
} catch (Exception $e) {
    // Afficher l'erreur
    echo "Erreur : " . $e->getMessage();
}
?>
