<?php
$usuario_logueado = isset($_SESSION['usuario_id']);
?>

<header class="banner">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo-container">
                <a href="<?= $base_url ?>public/home.php">
                    <img src="<?= $logo_url ?>" alt="Logo de la empresa" class="logo">
                </a>
            </div>
            
            <div class="nav-buttons">
                <?php if($usuario_logueado): ?>
                    <span class="me-3">¡Hola, <?= $_SESSION['nombre_usuario'] ?>!</span>
                    <a href="<?= $base_url ?>protected/index.php" class="btn btn-outline-primary">Panel CRM</a>
                    <a href="<?= $base_url ?>logout.php" class="btn btn-primary">Cerrar Sesión</a>
                <?php else: ?>
                    <?php if($es_pagina_publica): ?>
                        <a href="<?= $base_url ?>public/servicios.php" class="btn btn-link">Servicios</a>
                        <a href="<?= $base_url ?>public/contacto.php" class="btn btn-link">Contacto</a>
                    <?php endif; ?>
                    <a href="<?= $base_url ?>public/registro.php" class="btn btn-outline-primary">Registrarse</a>
                    <a href="<?= $base_url ?>public/login.php" class="btn btn-primary">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>