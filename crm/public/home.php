<?php
$titulo = "Inicio";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container mt-5">
    <div class="jumbotron text-center bg-light p-5 rounded">
        <h1 class="display-4">¡Bienvenido a nuestro CRM!</h1>
        <p class="lead">La solución perfecta para gestionar tus clientes y mejorar tus ventas</p>
        <hr class="my-4">
        <p>Accede a todas las funciones con tu cuenta o regístrate para empezar</p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="login.php" class="btn btn-primary btn-lg">Iniciar Sesión</a>
            <a href="registro.php" class="btn btn-success btn-lg">Registrarse</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill display-4 text-primary mb-3"></i>
                    <h3>Gestión de Clientes</h3>
                    <p>Organiza toda la información de tus clientes en un solo lugar.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="bi bi-graph-up display-4 text-success mb-3"></i>
                    <h3>Seguimiento de Ventas</h3>
                    <p>Monitorea oportunidades y mejora tu tasa de conversión.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="bi bi-chat-dots display-4 text-info mb-3"></i>
                    <h3>Historial de Interacciones</h3>
                    <p>Registra todas tus comunicaciones con cada cliente.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-5">
        <h2>¿Por qué elegir nuestro CRM?</h2>
        <div class="row mt-4">
            <div class="col-md-6 text-start">
                <ul class="list-group">
                    <li class="list-group-item border-0">✅ Fácil de usar e intuitivo</li>
                    <li class="list-group-item border-0">✅ Acceso desde cualquier dispositivo</li>
                    <li class="list-group-item border-0">✅ Seguridad de nivel empresarial</li>
                </ul>
            </div>
            <div class="col-md-6 text-start">
                <ul class="list-group">
                    <li class="list-group-item border-0">✅ Soporte técnico 24/7</li>
                    <li class="list-group-item border-0">✅ Actualizaciones constantes</li>
                    <li class="list-group-item border-0">✅ Integración con otras herramientas</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>