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

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $empresa = $_POST['empresa'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $notas = $_POST['notas'] ?? '';
    
    // Validación
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio";
    }
    if (empty($email)) {
        $errores[] = "El email es obligatorio";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido";
    }
    
    if (empty($errores)) {
        $stmt = $pdo->prepare("UPDATE clientes SET 
            nombre = ?, 
            empresa = ?, 
            email = ?, 
            telefono = ?, 
            notas = ?
            WHERE id = ?");
        $stmt->execute([$nombre, $empresa, $email, $telefono, $notas, $id]);
        
        header("Location: detalles.php?id=$id&exito=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Cliente</h1>
        
        <?php if (!empty($errores)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre completo *</label>
                <input type="text" name="nombre" class="form-control" 
                       value="<?= sanitizar($cliente['nombre']) ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Empresa</label>
                <input type="text" name="empresa" class="form-control" 
                       value="<?= sanitizar($cliente['empresa']) ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Email *</label>
                <input type="email" name="email" class="form-control" 
                       value="<?= sanitizar($cliente['email']) ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control" 
                       value="<?= sanitizar($cliente['telefono']) ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Notas</label>
                <textarea name="notas" class="form-control" rows="3"><?= 
                    sanitizar($cliente['notas']) ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="detalles.php?id=<?= $cliente['id'] ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>