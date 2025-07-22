<?php
session_start();
require_once __DIR__ . '/../includes/conexion.php';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validación
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio";
    }
    if (empty($email)) {
        $errores[] = "El email es obligatorio";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido";
    }
    if (empty($password)) {
        $errores[] = "La contraseña es obligatoria";
    } elseif (strlen($password) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres";
    }
    if ($password !== $confirm_password) {
        $errores[] = "Las contraseñas no coinciden";
    }
    
    if (empty($errores)) {
        // Verificar si el email ya existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            $errores[] = "Este email ya está registrado";
        } else {
            // Crear hash de contraseña
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            
            // Insertar nuevo usuario
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$nombre, $email, $password_hash]);
            
            // Obtener ID del nuevo usuario
            $usuario_id = $pdo->lastInsertId();
            
            // Iniciar sesión automáticamente
            $_SESSION['usuario_id'] = $usuario_id;
            $_SESSION['nombre_usuario'] = $nombre;
            
            header("Location: ../protected/index.php");
            exit;
        }
    }
}

$titulo = "Registro";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container mt-4">
    <h1 class="mb-4">Crear una cuenta</h1>
    
    <?php if (!empty($errores)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errores as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre completo *</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Contraseña *</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Confirmar contraseña *</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                
                <div class="mt-3 text-center">
                    ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>