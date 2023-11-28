<?php
// Connexion BDD
require 'C:\Users\Public\Desktop\ProjetCAF\FMN\connexion.php';


// Définition des variables
$id_materiel = isset($_POST['id_materiel']) ? $_POST['id_materiel'] : '';
$isiac = isset($_POST['isiac']) ? $_POST['isiac'] : '';
$saisie_select = isset($_POST['saisie_select']) ? $_POST['saisie_select'] : '';
$remis = isset($_POST['remis']) ? $_POST['remis'] : '';
$receptionne = isset($_POST['receptionne']) ? $_POST['receptionne'] : '';
$date_creation = isset($_POST['date_creation']) ? $_POST['date_creation'] : '';
$observation = isset($_POST['observation']) ? $_POST['observation'] : '';
$type_select = isset($_POST['type_select']) ? $_POST['type_select'] : '';


// Vérifier si le formulaire a été soumis pour afficher la liste du matériel
if ($type_select == 'afficher_liste') {
    // Vérifier si le type de sélection est valide
    if ($type_select == 'emprunt' || $type_select == 'restitution') {
        // Requête pour récupérer les données depuis la table "Emprunt" ou "Restitution" (selon la sélection)
        if ($type_select == 'emprunt') {
            $query = "SELECT * FROM Emprunt";
        } elseif ($type_select == 'restitution') {
            $query = "SELECT * FROM Restitution";
        }

        // Exécuter la requête de sélection si la variable $query est définie et non vide
        if (!empty($query)) {
            $result = mysqli_query($connexion, $query);

            // Vérifier si la requête a été exécutée avec succès
            if ($result && mysqli_num_rows($result) > 0) {
                // Afficher les enregistrements dans un tableau
                echo '<h2>Liste du matériel :</h2>';
                echo '<table>';
                echo '<tr><th>ID</th><th>Isiac</th><th>Saisie dans G@CI</th><th>Remis par</th><th>Réceptionné par</th><th>Date de création</th><th>Observations</th><th>Signatures</th></tr>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['id_materiel']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['isiac']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['saisie_select']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['remis']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['receptionne']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['date_creation']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['observation']) . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo "Aucune donnée à afficher.";
            }
        } else {
            // Si la requête est vide, afficher un message d'erreur ou rediriger l'utilisateur.
            echo "La requête est vide.";
            exit; // Sortir du script pour éviter d'exécuter la requête vide
        }
    } else {
        // Si le type_select n'est pas "emprunt" ou "restitution", vous pouvez afficher un message d'erreur ou rediriger l'utilisateur.
        echo "Type d'action non valide.";
        exit; // Sortir du script pour éviter d'exécuter la requête vide
    }
} else {
    // Code pour emprunt ou restitution
    if ($type_select == 'emprunt') {
        // Supposons que $signature est le chemin vers le fichier de l'image de la signature

        // Traitement pour l'emprunt
        $stmt = $connexion->prepare("INSERT INTO Emprunt (id_materiel, isiac, saisie_select, remis, receptionne, date_creation, observation) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $id_materiel, $isiac, $saisie_select, $remis, $receptionne, $date_creation, $observation);

        // Exécuter la requête d'insertion
        if ($stmt->execute()) {
            echo "Données insérées avec succès dans la table Emprunt.";
        } else {
            echo "Erreur lors de l'insertion des données dans la table Emprunt : " . $stmt->error;
        }

        $stmt->close();
    } elseif ($type_select == 'restitution') {
        // Traitement pour la restitution
        // Supposons que $encoded_signature est le chemin vers le fichier de l'image de la signature

        $stmt = $connexion->prepare("INSERT INTO Restitution (id_materiel, isiac, saisie_select, remis, receptionne, date_creation, observation) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $id_materiel, $isiac, $saisie_select, $remis, $receptionne, $date_creation, $observation);

        // Exécuter la requête d'insertion
        if ($stmt->execute()) {
            echo "Données insérées avec succès dans la table Restitution.";
        } else {
            echo "Erreur lors de l'insertion des données dans la table Restitution : " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Action non valide
        // Gérer l'erreur ou afficher un message d'erreur
        echo "Action non valide.";
    }
}

// Fermer la connexion
$connexion->close();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage données</title>
</head>

<body>
    <form action="donnees.php" method="GET">
        <input type="hidden" name="type_select" value="afficher_materiel">
        <button type="submit">Afficher liste matériels</button>
    </form>

</body>

</html>