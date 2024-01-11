<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure le fichier databaseConnexion.php
require_once('../Models/databaseConnexion.php');

class AuthController {
    private $connexion;

    // Constructeur de la classe AuthController
    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Fonction pour nettoyer les entrées utilisateur
    private function cleanInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Méthode pour gérer les requêtes POST
    public function handlePostRequests() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
            return $this->handleLogin();
        }
    }

    public function handleLogin() {
        try {
            // Nettoyage des entrées utilisateur
            $id_user = $this->cleanInput($_POST["id_user"]);
            $password = $this->cleanInput($_POST["password"]);
    
            // Affichez un message pour vérifier les valeurs nettoyées
            echo "Identifiant nettoyé : " . $id_user . "<br>";
            echo "Mot de passe nettoyé : " . $password . "<br>";
    
            // Vérification de l'existence de l'utilisateur dans la base de données
            $sql = "SELECT password_hash FROM Users WHERE id_user = ?";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bind_param("s", $id_user);
            $stmt->execute();
            $result = $stmt->get_result();
    
            // Affichez un message pour vérifier si la requête a été exécutée avec succès
            echo "Requête exécutée avec succès.<br>";
    
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
    
                // Vérification du mot de passe
                if (password_verify($password, $row['password_hash'])) {
                    // Démarre la session et enregistre l'ID de l'utilisateur
                    session_start();
                    $_SESSION['id_user'] = $id_user;
    
                    // Redirection vers parcView.php en cas de succès
                    header("Location: ../Views/parcView.php");
                    exit();
                } else {
                    // Mot de passe incorrect
                    throw new Exception("Mot de passe incorrect.");
                }
            } else {
                // Utilisateur introuvable
                throw new Exception("Identifiant introuvable.");
            }
    
            $stmt->close();
        } catch (Exception $e) {
            // Gestion des erreurs
            $message = "Erreur : " . $e->getMessage();
            echo $message;
        }
    }
    
}
?>
