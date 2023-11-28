<!DOCTYPE html>
<html>

<head>
    <title>Liste du matériel</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        h2 {
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <?php
    // Connexion BDD
    require 'C:\Users\Public\Desktop\ProjetCAF\FMN\connexion.php';

    // Requête SQL pour récupérer les données des tables en utilisant une jointure entre les tables Emprunt et Restitution
    // Requête SQL
    $sql = "SELECT 'Emprunt' AS type, id_emprunt AS id, id_materiel, isiac, saisie_select, date_creation, NULL AS type_select, remis, receptionne, observation
            FROM Emprunt
            UNION ALL
            SELECT 'Restitution' AS type, id_restitution AS id, id_materiel, isiac, saisie_select, date_creation, NULL AS type_select, remis, receptionne, observation
            FROM Restitution";

    // Exécution de la requête
    $result = $connexion->query($sql);

    ?>

    <h2>Liste du matériel :</h2>
    <table id="table-materiel">
        <thead>
            <tr>
                <th data-name="id_materiel" data-sortable="true">ID matériel</th>
                <th data-name="isiac" data-sortable="true">ISIAC</th>
                <th data-name="saisie_select" data-sortable="true">Saisie dans G@CI</th>
                <th data-name="date_creation" data-sortable="true">Date</th>
                <th data-name="type" data-sortable="true">Type</th>
                <th data-name="remis" data-sortable="true">Remis par :</th>
                <th data-name="receptionne" data-sortable="true">Réceptionné par :</th>
                <th data-name="observation" data-sortable="true">Observations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Parcourir les résultats et afficher les données s'il y en a
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['id_materiel']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['isiac']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['saisie_select']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['date_creation']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['type']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['remis']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['receptionne']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['observation']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="8">Aucun résultat trouvé.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <?php
    // Fermer le résultat de la requête si celui-ci est défini
    //  if (isset($result)) {
    //    $result->close();
    //}
    // Inclure la bibliothèque DataTables
    echo '<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>';
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-materiel').DataTable();
        });
    </script>
</body>

</html>