<?php
function envoyerEmail($to, $subject, $message) {
    // En-têtes pour l'email
    $headers = "From: noreply@votreentreprise.com\r\n";
    $headers .= "Reply-To: noreply@votreentreprise.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoi de l'email
    mail($to, $subject, $message, $headers);
}

// Exemple d'utilisation
$to = "service.informatique@votreentreprise.com"; // Remplacez par l'adresse email réelle du service informatique
$subject = "Nouvelle demande d'emprunt de matériel";
$message = "Une nouvelle demande d'emprunt de matériel a été soumise.";

// Appel de la fonction
envoyerEmail($to, $subject, $message);
?>
