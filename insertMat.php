<?php
// Assurez-vous que ces chemins sont corrects selon la structure de votre projet
require_once '../Models/databaseConnexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $ecran1_isiac = $_POST['ecran1_isiac'];
    $ecran2_isiac = $_POST['ecran2_isiac'];
    $uc_isiac = $_POST['uc_isiac'];
    $enregistre_dans_GACI = isset($_POST['enregistre_dans_GACI']) ? 1 : 0;
    $remis_par = $_POST['remis_par'];
    $emprunte_par = $_POST['emprunte_par'];
    $fonction = $_POST['fonction'];
    $date_emprunt = $_POST['date_emprunt'];
    $signataire_emprunteur = $_POST['signataire_emprunteur'];
    $signataire_defi = $_POST['signataire_defi'];
    $date_restitution = $_POST['date_restitution'];
    $recepteur = $_POST['recepteur'];
    $signataire_restitution = $_POST['signataire_restitution'];
    $observations = $_POST['observations'];

    // Connexion à la base de données
    $dbInstance = DatabaseConnection::getInstance();
    $connexion = $dbInstance->getConnection();

    // Préparation de la requête SQL
    $stmt = $connexion->prepare("INSERT INTO AttestationsMateriel (ecran1_isiac, ecran2_isiac, uc_isiac, enregistre_dans_GACI, remis_par, emprunte_par, fonction, date_emprunt, signataire_emprunteur, signataire_defi, date_restitution, recepteur, signataire_restitution, observations) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Liaison des paramètres
    $stmt->bind_param("sssissssssssss", $ecran1_isiac, $ecran2_isiac, $uc_isiac, $enregistre_dans_GACI, $remis_par, $emprunte_par, $fonction, $date_emprunt, $signataire_emprunteur, $signataire_defi, $date_restitution, $recepteur, $signataire_restitution, $observations);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Redirection vers la page de confirmation
        header("Location: ../Views/insertConfirmView.php");
        exit;
    } else {
        echo "Erreur lors de l'enregistrement : " . $stmt->error;
    }

    // Fermeture du statement
    $stmt->close();
}
?>
