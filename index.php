<?php
require 'config/db.php';

$stmt = $pdo->query("SELECT * FROM plants");
$plants = $stmt->fetchAll();
?>

<h1>Liste des plantes</h1>
<a href="create.php">➕ Ajouter une plante</a>
<ul>
<?php foreach ($plants as $plant): ?>
    <li>
        <?= htmlspecialchars($plant['name']) ?> (<?= $plant['height_cm'] ?> cm) —
        <a href="show.php?id=<?= $plant['id'] ?>">Détails</a> |
        <a href="edit.php?id=<?= $plant['id'] ?>">Modifier</a> |
        <a href="delete.php?id=<?= $plant['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
    </li>
<?php endforeach; ?>
</ul>
