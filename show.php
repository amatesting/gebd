<?php
require 'config/db.php';
$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM plants WHERE id = ?");
$stmt->execute([$id]);
$plant = $stmt->fetch();

if (!$plant) {
    die("Plante introuvable.");
}
?>

<h2>Détails de <?= htmlspecialchars($plant['name']) ?></h2>
<ul>
    <li>Espèce : <?= htmlspecialchars($plant['species']) ?></li>
    <li>Hauteur : <?= htmlspecialchars($plant['height_cm']) ?> cm</li>
    <li>Arrosage : <?= htmlspecialchars($plant['watering']) ?></li>
    <li>Lumière : <?= htmlspecialchars($plant['sunlight']) ?></li>
    <li>Animaux OK : <?= $plant['pet_friendly'] ? 'Oui' : 'Non' ?></li>
</ul>
<a href="index.php">⬅ Retour</a>
