<?php
require_once 'includes/conexion.php';
require_once 'includes/proteger.php';
require_once 'includes/funciones.php';
$pagina_actual = basename($_SERVER['PHP_SELF']);
require_once 'includes/header.php';
?>
$id = $_GET['id'] ?? 0;
$cliente = obtenerClientePorId($pdo, $id);

if (!$cliente) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Detalles del Cliente</h1>
        
        <?php if (isset($_GET['exito'])): ?>
            <div class="alert alert-success">¡Cliente actualizado correctamente!</div>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= sanitizar($cliente['nombre']) ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= sanitizar($cliente['empresa']) ?></h6>
                <p class="card-text">
                    <strong>Email:</strong> <?= sanitizar($cliente['email']) ?><br>
                    <strong>Teléfono:</strong> <?= sanitizar($cliente['telefono']) ?><br>
                    <strong>Notas:</strong> <?= sanitizar($cliente['notas']) ?>
                </p>
                <a href="index.php" class="btn btn-primary">Volver al listado</a>
                <a href="editar.php?id=<?= $cliente['id'] ?>" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
</body>
</html>