<?php
include 'connexion.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $filiere_id = $_POST['filiere_id'];

    $stmt = $pdo->prepare("UPDATE etudiants SET nom=?, prenom=?, filiere_id=? WHERE id=?");
    $stmt->execute([$nom, $prenom, $filiere_id, $id]);

    header('Location: index.php');
    exit;
}

$etudiant = $pdo->prepare("SELECT * FROM etudiants WHERE id=?");
$etudiant->execute([$id]);
$etudiant = $etudiant->fetch();

$filieres = $pdo->query("SELECT * FROM filieres")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier étudiant</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier un étudiant</h1>
        <form action="update.php?id=<?= $id ?>" method="POST" onsubmit="return valider()">
            <input type="text" name="nom" id="nom" value="<?= $etudiant['nom'] ?>" />
            <input type="text" name="prenom" id="prenom" value="<?= $etudiant['prenom'] ?>" />
            <select name="filiere_id">
                <?php foreach($filieres as $f): ?>
                    <option value="<?= $f['id'] ?>" <?= $f['id'] == $etudiant['filiere_id'] ? 'selected' : '' ?>>
                        <?= $f['nom'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Modifier</button>
        </form>
        <a href="index.php">Retour</a>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>