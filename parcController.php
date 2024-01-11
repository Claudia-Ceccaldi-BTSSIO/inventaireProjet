<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../src/Models/materiel.php';
require_once '../src/Models/databaseConnexion.php';

class ParcController {
    private $materielModel;

    public function __construct($connection) {
        $this->materielModel = new Materiel($connection);
    }

    public function handleRequest() {
        try {
            // Validation et nettoyage de la variable $_GET['search']
            $search = isset($_GET['search']) ? filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING) : '';

            $materielData = $this->materielModel->searchMateriel($search);

            // Passer $materielData à la vue
            include_once('../Views/parcView.php');
        } catch (Exception $e) {
            // Gérez l'erreur ici
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>
