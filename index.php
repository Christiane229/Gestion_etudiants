<?php include 'connexion.php'; ?>
<?php
$filieres = $pdo->query("SELECT * FROM filieres")->fetchAll();
$etudiants = $pdo->query("SELECT e.*, f.nom as filiere FROM etudiants e JOIN filieres f ON e.filiere_id = f.id")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Étudiants</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Étudiants</h1>

        <h2>Ajouter un étudiant</h2>
        <form action="traitement.php" method="POST" onsubmit="return valider()">
            <input type="text" name="nom" id="nom" placeholder="Nom" />
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" />
            <select name="filiere_id">
                <?php foreach($filieres as $f): ?>
                    <option value="<?= $f['id'] ?>"><?= $f['nom'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Ajouter</button>
        </form>

        <h2>Liste des étudiants</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Filière</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($etudiants as $e): ?>
                <tr>
                    <td><?= $e['nom'] ?></td>
                    <td><?= $e['prenom'] ?></td>
                    <td><?= $e['filiere'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $e['id'] ?>">Modifier</a>
                        <a href="delete.php?id=<?= $e['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>