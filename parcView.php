<?php
// Inclusion des fichiers pour l'authentification et la connexion à la base de données
require_once '../Controllers/authController.php';
require_once '../Models/databaseConnexion.php';
require_once '../Models/materiel.php'; // Inclusion de la classe Materiel

// Démarrage d'une session si aucune session n'est active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Création d'une instance de la classe Materiel
$materiel = new Materiel();

// Récupération du terme de recherche s'il a été soumis
$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

// Appel de la méthode searchMateriel pour obtenir les données en fonction du terme de recherche
$materielData = $materiel->searchMateriel($searchTerm);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Métadonnées et liens CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PARC de la CAF 47</title>
    <base href="http://localhost/projetcaf/">
    <link rel="stylesheet" href="public/assets/css/main.css?v=1">
</head>
<body>
    <nav>
        <!-- Barre de navigation -->
          <!-- Bouton de retour à la page d'accueil -->
          <a href="public/index.php" class="retour-accueil">Retour à la page d'accueil</a>
    </nav>

    <!-- Bouton pour afficher le formulaire d'ajout de matériel -->
    <button id="showFormButton">Ajout d'un matériel</button>

    <!-- Formulaire d'ajout de matériel, initialement caché -->
    <form id="ajoutMaterielForm" action="src/Utils/insert.php" method="post" style="display: none;">
        <!-- Champs du formulaire correspondant à la structure de la table 'Materiel' -->
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prénom" required>
        <input type="text" name="service" placeholder="Service" required>
        <input type="text" name="type_select" placeholder="Type de matériel" required>
        <input type="text" name="_description" placeholder="Description" required>
        <input type="text" name="emplacement" placeholder="Emplacement" required>
        <input type="number" name="annee_uc" placeholder="Année UC">
        <input type="submit" value="Ajouter">
    </form>

    <!-- Formulaire de recherche -->
    <form action="src/Views/parcView.php" method="post">
        <input type="text" id="search" name="search" placeholder="Rechercher par nom...">
        <input type="submit" value="Recherche">
    </form>

    <!-- Affichage des messages d'erreur, le cas échéant -->
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']);
    }
    ?>

    <!-- Tableau pour afficher les données du matériel -->
    <table>
        <thead>
            <!-- En-têtes du tableau -->
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Service</th>
                <th>Type de matériel</th>
                <th>Description</th>
                <th>Emplacement</th>
                <th>Année UC</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Boucle pour remplir le tableau avec les données du matériel -->
            <?php foreach ($materielData as $row): ?>
                <tr>
                    <!-- Affichage des données de chaque matériel -->
                    <td><?= htmlspecialchars($row['nom']) ?></td>
                    <td><?= htmlspecialchars($row['prenom']) ?></td>
                    <td><?= htmlspecialchars($row['service']) ?></td>
                    <td><?= htmlspecialchars($row['type_select']) ?></td>
                    <td><?= htmlspecialchars($row['_description']) ?></td>
                    <td><?= htmlspecialchars($row['emplacement']) ?></td>
                    <td><?= htmlspecialchars($row['annee_uc']) ?></td>
                    <td>
                        <!-- Liens pour modifier et supprimer le matériel -->
                        <a href='src/Utils/update.php?id_materiel=<?= $row['id_materiel'] ?>'>Modifier</a> |
                        <a href='src/Utils/delete.php?id_materiel=<?= $row['id_materiel'] ?>' onclick='return confirm("Confirmez la suppression");'>Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Script JavaScript pour gérer l'affichage du formulaire d'ajout de matériel -->
    <script>
        document.getElementById('showFormButton').addEventListener('click', function() {
            var form = document.getElementById('ajoutMaterielForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>
</html>
