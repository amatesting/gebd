<?php
require 'config/db.php';
$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM plants WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
