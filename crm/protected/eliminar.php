<?php
require_once 'includes/conexion.php';
require_once 'includes/proteger.php';
require_once 'includes/funciones.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>