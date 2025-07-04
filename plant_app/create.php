<?php
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO plants (name, species, sunlight, watering, pet_friendly, height_cm) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['name'],
        $_POST['species'],
        $_POST['sunlight'],
        $_POST['watering'],
        isset($_POST['pet_friendly']) ? 1 : 0,
        $_POST['height_cm']
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>Ajouter une plante</h2>
<form method="POST">
    <input name="name" placeholder="Nom" required><br>
    <input name="species" placeholder="Espèce" required><br>
    <input name="sunlight" placeholder="Lumière" required><br>
    <input name="watering" placeholder="Arrosage" required><br>
    <label><input type="checkbox" name="pet_friendly"> Adaptée aux animaux</label><br>
    <input name="height_cm" placeholder="Hauteur (cm)" type="number" required><br>
    <button type="submit">Créer</button>
</form>
<a href="index.php">⬅ Retour</a>
