<?php
// --- Test de phpinfo() ---
echo "<h1>¡Hola desde el proyecto Reactify en Docker!</h1>";
echo "<h2>Información de PHP:</h2>";
phpinfo();

// --- Test de Conexión a la Base de Datos ---
echo "<hr>";
echo "<h2>Test de Conexión a MySQL:</h2>";

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
    echo "<p style='color:green;'><strong>¡Conexión a la base de datos exitosa!</strong></p>";
    $stmt = $pdo->query("SELECT 'Hola desde MySQL para el proyecto Reactify!' AS mensaje");
    $row = $stmt->fetch();
    echo "<p>Mensaje desde la BD: " . htmlspecialchars($row['mensaje']) . "</p>";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>