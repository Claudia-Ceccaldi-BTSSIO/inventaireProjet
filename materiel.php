<?php
// Démarrer une session si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Inclure le fichier pour la connexion à la base de données
require_once '../Models/databaseConnexion.php';

// Définition de la classe Materiel
class Materiel {
    private $db;

    // Constructeur de la classe
    public function __construct() {
        // Obtenir une instance de connexion à la base de données
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    // Méthode pour rechercher du matériel
    public function searchMateriel($searchTerm) {
        try {
            // Préparer la requête SQL en fonction de la présence d'un terme de recherche
            if (!empty($searchTerm)) {
                $searchTerm = "%{$searchTerm}%"; // Modifier pour inclure le terme de recherche avant et après
                $stmt = $this->db->prepare("SELECT * FROM Materiel WHERE _description LIKE ? OR nom LIKE ? OR prenom LIKE ? OR service LIKE ?");
                $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
                
            } else {
                // Si aucun terme de recherche n'est fourni, sélectionner tous les matériels
                $stmt = $this->db->prepare("SELECT * FROM Materiel");
            }

            // Exécuter la requête
            $stmt->execute();
            // Récupérer et retourner le résultat
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            // Gestion des erreurs
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>
