<?php
function obtenerClientes($pdo) {
    $stmt = $pdo->query("SELECT * FROM clientes ORDER BY id DESC");
    return $stmt->fetchAll();
}

function obtenerClientePorId($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function sanitizar($dato) {
    return htmlspecialchars(strip_tags(trim($dato)));
}
?>