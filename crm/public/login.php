<?php
session_start();
require_once __DIR__ . 'includes/conexion.php';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Validación básica
    if (empty($email) || empty($password)) {
        $errores[] = "Ambos campos son obligatorios";
    } else {
        // Verificar credenciales
        $stmt = $pdo->prepare("SELECT id, nombre, password FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();
        
        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre_usuario'] = $usuario['nombre'];
            header("Location: index.php");
            exit;
        } else {
            $errores[] = "Credenciales incorrectas";
        }
    }
}

$titulo = "Iniciar Sesión";
require_once 'includes/header.php';
?>

<div class="container mt-4">
    <h1 class="mb-4">Iniciar Sesión</h1>
    
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
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Contraseña *</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Recordarme</label>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                
                <div class="mt-3 text-center">
                    <a href="#">¿Olvidaste tu contraseña?</a><br>
                    ¿No tienes cuenta? <a href="registro.php">Regístrate</a>
                </div>
            </form>
        </div>
    </div>
</div>
$titulo = "Iniciar Sesión";
<?php require_once __DIR__ . 'includes/footer.php'; ?>