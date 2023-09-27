<?php
require_once('config.php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM materiel WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "Aucun ID fourni.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mise à jour</title>
    <link rel="stylesheet" href="CSS/main.css" />
</head>

<body>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <input type="text" name="num_isiac" placeholder="Numéro Isiac" value="<?php echo $data['num_isiac']; ?>" />
        <input type="text" name="_description" placeholder="Description" value="<?php echo $data['_description']; ?>" />
        <input type="text" name="nom" placeholder="Nom" value="<?php echo $data['nom']; ?>" />
        <input type="text" name="emplacement" placeholder="Emplacement" value="<?php echo $data['emplacement']; ?>" />
        <input type="number" name="annee_uc" placeholder="Année UC" value="<?php echo $data['annee_uc']; ?>" />
        <input type="submit" value="Mettre à jour" />
    </form>
</body>

</html>