<?php
require 'config/db.php';
$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("SELECT * FROM plants WHERE id = ?");
$stmt->execute([$id]);
$plant = $stmt->fetch();

if (!$plant) {
    die("Plante introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE plants SET name=?, species=?, sunlight=?, watering=?, pet_friendly=?, height_cm=? WHERE id=?");
    $stmt->execute([
        $_POST['name'],
        $_POST['species'],
        $_POST['sunlight'],
        $_POST['watering'],
        isset($_POST['pet_friendly']) ? 1 : 0,
        $_POST['height_cm'],
        $id
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>Modifier la plante</h2>
<form method="POST">
    <input name="name" value="<?= htmlspecialchars($plant['name']) ?>" required><br>
    <input name="species" value="<?= htmlspecialchars($plant['species']) ?>" required><br>
    <input name="sunlight" value="<?= htmlspecialchars($plant['sunlight']) ?>" required><br>
    <input name="watering" value="<?= htmlspecialchars($plant['watering']) ?>" required><br>
    <label>
        <input type="checkbox" name="pet_friendly" <?= $plant['pet_friendly'] ? 'checked' : '' ?>> Adaptée aux animaux
    </label><br>
    <input name="height_cm" type="number" value="<?= $plant['height_cm'] ?>" required><br>
    <button type="submit">Enregistrer</button>
</form>
<a href="index.php">⬅ Retour</a>
