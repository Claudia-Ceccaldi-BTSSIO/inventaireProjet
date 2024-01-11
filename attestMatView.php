<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Formulaire d'Attestation de Matériel Nomade</title>
    <base href="http://localhost/projetcaf/">
    <link rel="stylesheet" href="public/assets/css/style_attMat.css">
</head>
<body>
    <h2>Formulaire d'Attestation de Matériel Nomade</h2>

    <form action="src/Utils/insertMat.php" method="post">
        <div>
            <label for="ecran1_isiac">Isiac Écran 1:</label>
            <input type="text" id="ecran1_isiac" name="ecran1_isiac" required>
        </div>

        <div>
            <label for="ecran2_isiac">Isiac Écran 2:</label>
            <input type="text" id="ecran2_isiac" name="ecran2_isiac"required>
        </div>

        <div>
            <label for="uc_isiac">Isiac UC:</label>
            <input type="text" id="uc_isiac" name="uc_isiac"required>
        </div>

        <div>
            <label for="enregistre_dans_GACI">Enregistré dans @G@CI:</label>
            <input type="checkbox" id="enregistre_dans_GACI" name="enregistre_dans_GACI"required>
        </div>

        <div>
            <label for="remis_par">Remis par:</label>
            <input type="text" id="remis_par" name="remis_par"required>
        </div>

        <div>
            <label for="emprunte_par">Emprunté par:</label>
            <input type="text" id="emprunte_par" name="emprunte_par"required>
        </div>

        <div>
            <label for="fonction">Fonction:</label>
            <input type="text" id="fonction" name="fonction"required>
        </div>

        <div>
            <label for="date_emprunt">Date d'emprunt:</label>
            <input type="date" id="date_emprunt" name="date_emprunt"required>
        </div>

        <div>
            <label for="signataire_emprunteur">Signataire emprunteur:</label>
            <input type="text" id="signataire_emprunteur" name="signataire_emprunteur"required>
        </div>

        <div>
            <label for="signataire_defi">Signataire DEFi:</label>
            <input type="text" id="signataire_defi" name="signataire_defi"required>
        </div>

        <div>
            <label for="date_restitution">Date de restitution:</label>
            <input type="date" id="date_restitution" name="date_restitution"required>
        </div>

        <div>
            <label for="recepteur">Récepteur:</label>
            <input type="text" id="recepteur" name="recepteur"required>
        </div>

        <div>
            <label for="signataire_restitution">Signataire restitution:</label>
            <input type="text" id="signataire_restitution" name="signataire_restitution"required>
        </div>

        <div>
            <label for="observations">Observations:</label>
            <textarea id="observations" name="observations"required></textarea>
        </div>

        <div>
            <input type="submit" value="Soumettre">
        </div>
    </form>
</body>
</html>
