<?php
namespace Src\Auth;

include_once "./domain/User.php";
use User;

class AuthController
{
    public static function showLoginForm()
    { /* ... lógica para mostrar el formulario ... */
        $file_path = __DIR__ . '/Login/Login.php';
        include $file_path;
    }
    public static function handleLoginPost()
    { 
        $data = $_POST;
        if(!empty($data['password']) && !empty($data['correo'])){
            $user = User::findByCorreo($data['correo']);
            if($user && $user->verifyPassword($data['password'])){
                // TODO: Iniciar sesión
                error_log("Login exitoso. Bienvenido, " . htmlspecialchars($user->nombre));
                header('Location: /dashboard'); // Redirigir después del login
                return;
            } else {
                error_log("Credenciales invalidas");
                self::showLoginForm();
            }
        } else {
            error_log("Campos vacíos") ;
            error_log("Por favor, completa todos los campos.");
            self::showLoginForm();
        }
    }

    public static function showRegisterForm()
    { 
        $file_path = __DIR__ . '/Register/Register.php';
        include $file_path;
    }
    public static function handleRegisterPost()
    { 
        $data = $_POST;
        return $data;
    }

    public static function logout()
    { /* ... ... */
    }
}
