<?php
include 'connexion.php';
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$filiere_id = $_POST['filiere_id'];

$stmt = $pdo->prepare("INSERT INTO etudiants (nom, prenom, filiere_id) VALUES (?, ?, ?)");
$stmt->execute([$nom, $prenom, $filiere_id]);

header('Location: index.php');
exit;
?>