<?php

require_once '../Models/databaseConnexion.php';
require_once '../Controllers/authController.php';

$db = DatabaseConnection::getInstance()->getConnection();
$authController = new AuthController($db);

// Si le formulaire de connexion a été soumis, gérer la requête POST.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController->handlePostRequests();
}

// Le chemin doit être relatif au dossier 'public'
$linkPathToCSS = "../assets/css/style.css?v=1"; // Ce chemin doit être ajusté selon où se trouve loginView.php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <base href="http://localhost/projetcaf/">
    <link rel="stylesheet" href="public/assets/css/style_login.css?v=1">
</head>
<body>
    <header><!-- En-tête --></header>
    <nav><!-- Barre de navigation --></nav>
    <main>
        <div class="container">
            <h2>Connexion</h2>
            <!-- Affiche le formulaire de connexion ici -->
            <form action="src/Views/parcView.php" method="post">
                <label for="id_user_login">Identifiant :</label>
                <input type="text" id="id_user_login" name="id_user" required>
                <label for="password_login">Mot de passe :</label>
                <input type="password" id="password_login" name="password" required>
                <input type="submit" name="login" value="Se connecter">
            </form>
        </div>
    </main>
    <footer><!-- Pied de page --></footer>
</body>
</html>
