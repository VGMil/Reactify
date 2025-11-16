<?php

 $config = loadEnv(__DIR__);

if ($config === false) {
    die("No se pudo cargar el archivo de configuración .env");
}
define("MYSQL_HOST", 'db');
define("MYSQL_DATABASE", $config["MYSQL_DATABASE"]);
define("MYSQL_USER", $config["MYSQL_USER"]);
define("MYSQL_PASSWORD", $config["MYSQL_PASSWORD"]);


$host = MYSQL_HOST; // Nombre del servicio de la base de datos en docker-compose.yml
$dbname = MYSQL_DATABASE; // Nombre de la BD definida en el .env
$user = MYSQL_USER; // Usuario definido en el .env
$pass = MYSQL_PASSWORD; // Contraseña definida en el .env
$charset = 'utf8mb4';



$dsn = "mysql:host=".MYSQL_HOST."host;dbname=".MYSQL_DATABASE.";charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD, $options);
    error_log( "¡Conexión a la base de datos exitosa!");
    $stmt = $pdo->query("SELECT 'Hola desde MySQL para el proyecto Reactify!' AS mensaje");
    $row = $stmt->fetch();
    error_log( "Mensaje desde la BD: " . ($row['mensaje']));
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
