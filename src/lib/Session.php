<?php 

namespace Lib;
class Session
{
    /**
     * SINGLETON
     * Inicia la sesión si no está activa.
     * Es seguro llamarlo múltiples veces gracias a `session_status()`.
    */
    public static function start(): void{
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    error_log('DEBUG: Contenido completo de $_SESSION -> ' . print_r($_SESSION, true));

    }
    public static function set(string $key, mixed $value): void{
        self::start();
        $_SESSION[$key] = $value;
    }
    public static function get(string $key, mixed $default = null): mixed{
        self::start();
        return $_SESSION[$key] ?? $default;
    }
    public static function has(string $key): bool{
        self::start();
        return isset($_SESSION[$key]);
    }
    public static function remove(string $key): void{
        self::start();
        unset($_SESSION[$key]);
    }
    public static function destroy(): void{
        self::start();
        session_unset(); // Elimina todas las variables de sesión
        session_destroy(); // Destruye la sesión
    }
    public static function flash(string $key, mixed $value): void{
        self::set("_flash.$key", $value);
    }
    public static function getFlash(string $key, mixed $default = null): mixed{
        $value = self::get("_flash.$key", $default);
        self::remove("_flash.$key");
        return $value;
    }
}
