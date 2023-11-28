<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mise à jour</title>
  <link rel="stylesheet" href="CSS/main.css" />
</head>

<body>
  <?php

  require_once('config.php');


  $id = isset($_GET['id']) ? $_GET['id'] : null;
  if ($id) {
    $stmt = $connexion->prepare("SELECT * FROM materiel WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row) {
      $num_isiac = $row['num_isiac'];
      $nom = $row['nom'];
      $_description = $row['_description'];
      $emplacement = $row['emplacement'];
      $annee_uc = $row['annee_uc'];
    } else {
      echo "Erreur: Matériel non trouvé";
      exit;
    }
    $stmt->close();
  } else {
    header("Location: parc.php");
    exit;
  }
  ?>

  <form action="update_post.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <input type="text" name="num_isiac" placeholder="Numéro Isiac" value="<?php echo $num_isiac; ?>" />
    <input type="text" name="nom" placeholder="Nom" value="<?php echo $nom; ?>" />
    <input type="text" name="_description" placeholder="Description" value="<?php echo $_description; ?>" />
    <input type="text" name="emplacement" placeholder="Emplacement" value="<?php echo $emplacement; ?>" />
    <input type="number" name="annee_uc" placeholder="Année UC" value="<?php echo $annee_uc; ?>" />
    <input type="submit" value="Mettre à jour" />
  </form>
</body>

</html>
