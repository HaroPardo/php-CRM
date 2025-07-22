<?php
$host = 'localhost';      
$db   = 'crm_basico';      
$user = 'root';            
$pass = '';                
$charset = 'utf8mb4';      

// Configuración de la cadena de conexión
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones avanzadas para PDO
$opciones = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        
    PDO::ATTR_EMULATE_PREPARES   => false,                   
];

try {
    // Intenta crear la conexión
    $pdo = new PDO($dsn, $user, $pass, $opciones);
} catch (\PDOException $e) {
    // Errores
    die("ERROR DE CONEXIÓN: " . $e->getMessage());
}
?>