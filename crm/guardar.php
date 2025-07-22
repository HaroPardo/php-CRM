<?php
require_once 'includes/conexion.php';

$operacion = $_POST['oper'];

switch ($operacion) {
    case 'add':
        // Crear nuevo cliente
        $stmt = $pdo->prepare("INSERT INTO clientes (nombre, empresa, email, telefono, notas) 
                              VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['nombre'],
            $_POST['empresa'],
            $_POST['email'],
            $_POST['telefono'],
            $_POST['notas'] ?? ''
        ]);
        break;
        
    case 'edit':
        // Actualizar cliente existente
        $id = $_POST['id'];
        $stmt = $pdo->prepare("UPDATE clientes SET 
            nombre = ?, 
            empresa = ?, 
            email = ?, 
            telefono = ?, 
            notas = ?
            WHERE id = ?");
        $stmt->execute([
            $_POST['nombre'],
            $_POST['empresa'],
            $_POST['email'],
            $_POST['telefono'],
            $_POST['notas'] ?? '',
            $id
        ]);
        break;
        
    case 'del':
        // Eliminar cliente
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
        $stmt->execute([$id]);
        break;
}

echo json_encode(['success' => true]);