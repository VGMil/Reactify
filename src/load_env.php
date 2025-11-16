<?php

/**
 * Carga las variables desde un archivo .env a un array.
 *
 * @param string $path La ruta al directorio donde está el archivo .env.
 * @return array|false El array de variables o false si falla.
 */
function loadEnv(string $path) {
    $envFile = rtrim($path, '/') . '/.env';

    if (!file_exists($envFile)) {
        
        error_log("El archivo .env no se encuentra en: " . $envFile);
        return false;
    }

    return parse_ini_file($envFile);
}