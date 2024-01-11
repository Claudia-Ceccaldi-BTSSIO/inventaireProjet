<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour Matériel</title>
    <base href="http://localhost/projetcaf/">
    <link rel="stylesheet" href="public/assets/css/style_update.css?v=1">
</head>
<body>
    <nav>
        <!-- Votre navigation ici -->
    </nav>

    <?php if (isset($error_message) && $error_message): ?>
        <p class="error-message"><?= $error_message ?></p>
    <?php endif; ?>

    <div class="update-container">
        <?php if ($item): ?>
            <form action="src/Utils/update.php" method="post" class="update-form">
                <input type="hidden" name="id_materiel" value="<?= htmlspecialchars($item['id_materiel']) ?>">

                <div class="update-form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($item['nom']) ?>" required>
                </div>
                
                <div class="update-form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($item['prenom']) ?>" required>
                </div>

                <div class="update-form-group">
                    <label for="service">Service</label>
                    <input type="text" id="service" name="service" value="<?= htmlspecialchars($item['service']) ?>" required>
                </div>

                <div class="update-form-group">
                    <label for="type_select">Type de matériel</label>
                    <input type="text" id="type_select" name="type_select" value="<?= htmlspecialchars($item['type_select']) ?>" required>
                </div>
                
                <div class="update-form-group">
                    <label for="_description">Description</label>
                    <textarea id="_description" name="_description" required><?= htmlspecialchars($item['_description']) ?></textarea>
                </div>
                
                <div class="update-form-group">
                    <label for="emplacement">Emplacement</label>
                    <input type="text" id="emplacement" name="emplacement" value="<?= htmlspecialchars($item['emplacement']) ?>" required>
                </div>
                
                <div class="update-form-group">
                    <label for="annee_uc">Année UC</label>
                    <input type="number" id="annee_uc" name="annee_uc" value="<?= htmlspecialchars($item['annee_uc']) ?>">
                </div>
                
                <div class="update-form-action">
                    <input type="submit" name="update" value="Mettre à jour">
                </div>
            </form>
        <?php else: ?>
            <p>Aucun élément sélectionné pour la mise à jour.</p>
        <?php endif; ?>
    </div>
</body>
</html>
