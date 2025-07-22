<?php
$titulo_pagina = "Gestión de Clientes";

require_once __DIR__ . '/../includes/template-start.php';

require_once __DIR__ . '/../includes/proteger.php';
require_once __DIR__ . '/../includes/conexion.php';
require_once __DIR__ . '/../includes/funciones.php';

$clientes = obtenerClientes($pdo);
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><?= $titulo_pagina ?></h1>
        <a href="crear.php" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nuevo Cliente
        </a>
    </div>

    <?php if (empty($clientes)): ?>
        <div class="alert alert-info">No hay clientes registrados.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Email</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td class="align-middle"><?= $cliente['id'] ?></td>
                        <td class="align-middle"><?= sanitizar($cliente['nombre']) ?></td>
                        <td class="align-middle"><?= sanitizar($cliente['empresa']) ?></td>
                        <td class="align-middle"><?= sanitizar($cliente['email']) ?></td>
                        <td class="text-center align-middle">
                            <div class="btn-group" role="group">
                                <a href="detalles.php?id=<?= $cliente['id'] ?>" 
                                   class="btn btn-sm btn-info"
                                   title="Ver detalles">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="editar.php?id=<?= $cliente['id'] ?>" 
                                   class="btn btn-sm btn-warning"
                                   title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="eliminar.php?id=<?= $cliente['id'] ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('¿Eliminar este cliente?')"
                                   title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php
require_once __DIR__ . '/../includes/template-end.php';