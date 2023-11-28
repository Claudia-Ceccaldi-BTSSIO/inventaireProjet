<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PARC de la CAF 47</title>
  <link rel="stylesheet" href="CSS/main.css" />
</head>

<body>

  <nav>
    <ul>
      <li><a href="index.html">Accueil</a></li>
      <li><a href="parc.php">PARC</a></li>
      <li><a href="FMN/index.php">Fiche MN</a></li>
    </ul>
  </nav>

  <form action="parc.php" method="get">
    <input type="text" id="search" name="search" placeholder="Rechercher par nom..." />
    <input type="submit" value="Recherche" />
  </form>
  <br>
  <form action="insert.php" method="post">
    <input type="text" name="num_isiac" placeholder="Numéro Isiac" />
    <input type="text" name="nom" placeholder="Nom" />
    <input type="text" name="_description" placeholder="Description" />
    <input type="text" name="emplacement" placeholder="Emplacement" />
    <input type="number" name="annee_uc" placeholder="Année UC" />
    <input type="submit" value="Ajouter" />
  </form>
  <table>
    <thead>
      <tr>
        <th>Numéro Isiac</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Emplacement</th>
        <th>Année UC</th>
        <th>Modifier</th>
        <th>Suppression</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once('config.php');



      $search = isset($_GET['search']) ? $_GET['search'] : '';
      if ($search) {
        $stmt = $connexion->prepare("SELECT * FROM materiel WHERE nom LIKE ?");
        $likeSearch = "%" . $search . "%";
        $stmt->bind_param("s", $likeSearch);
      } else {
        $stmt = $connexion->prepare("SELECT * FROM materiel");
      }

      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['num_isiac'] . "</td>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['_description'] . "</td>";
        echo "<td>" . $row['emplacement'] . "</td>";
        echo "<td>" . $row['annee_uc'] . "</td>";
        echo "<td><a href='update.php?id=" . $row['id'] . "'>Modifier</a></td>";  // Bouton Modifier
        echo "<td><a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette entrée ?\");'>Supprimer</a></td>";
        echo "</tr>";
      }
      $stmt->close();
      $connexion->close();
      ?>
    </tbody>
  </table>
</body>

</html>
