<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$es_pagina_publica = strpos($_SERVER['PHP_SELF'], '/public/') !== false;
$es_pagina_protegida = strpos($_SERVER['PHP_SELF'], '/protected/') !== false;

$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/crm/';
$logo_url = $base_url . 'logo_empresa.png';

$titulo_pagina = $titulo_pagina ?? 'CRM Básico';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo_pagina ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="<?= $base_url ?>estilo.css">
</head>
<body class="d-flex flex-column min-vh-100">

<?php
require_once __DIR__ . '/header.php';
?>

<main class="flex-grow-1">