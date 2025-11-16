<?php

 $config = loadEnv(__DIR__);

if ($config === false) {
    die("No se pudo cargar el archivo de configuración .env");
}
define("MYSQL_HOST", 'db');
define("MYSQL_DATABASE", $config["MYSQL_DATABASE"]);
define("MYSQL_USER", $config["MYSQL_USER"]);
define("MYSQL_PASSWORD", $config["MYSQL_PASSWORD"]);

$connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

if($connection->connect_error) {
    error_log("". $connection->connect_error);
    die("Error de conexion". $connection->connect_error);
}else{
    error_log("Conectado con exito a la Base de Datos");
    $connection->close();
}



