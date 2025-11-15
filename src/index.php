<?php
require_once __DIR__ . '/functions.php';
$host = 'db'; // Nombre del servicio de la base de datos en docker-compose.yml
$dbname = 'reactifyDB'; // Nombre de la BD definida en el .env
$user = 'reactify'; // Usuario definido en el .env
$pass = 'reactify'; // Contraseña definida en el .env
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $stmt = $pdo->query("SELECT 'Hola desde MySQL para el proyecto Reactify!' AS mensaje");
    $row = $stmt->fetch();
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

header("location: auth/Login/Login.php");
?>

