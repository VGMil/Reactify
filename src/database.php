<?php

 $config = loadEnv(__DIR__);

if ($config === false) {
    die("No se pudo cargar el archivo de configuración .env");
}

function getDatabaseConnection(): mysqli
{
    // Carga las variables de entorno desde .env
     $config = loadEnv(__DIR__);

    if ($config === false) {
        die("No se pudo cargar el archivo de configuración .env");
    }

    $host = 'db';
    $user = $config['MYSQL_USER'];
    $pass = $config['MYSQL_PASSWORD'];
    $db   = $config['MYSQL_DATABASE'];

    $mysqli = new mysqli($host, $user, $pass, $db);

    if ($mysqli->connect_error) {

        die("Error de conexión: " . $mysqli->connect_error);
    }

    // ¡Muy importante! Establecer el charset para evitar problemas con acentos y ñ
    $mysqli->set_charset("utf8mb4");

    return $mysqli;
}


