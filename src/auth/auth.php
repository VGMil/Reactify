<?php
namespace Src\Auth;

include_once "./domain/User.php";

use Error;
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
                exit();
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
        // 1. Obtener y limpiar los datos del formulario
        $nombre = trim($_POST['nombre'] ?? '');
        $correo = trim($_POST['correo'] ?? '');
        $password = trim($_POST['password'] ?? '');

        //Validación básica en el lado del servidor
        if (empty($nombre) || empty($correo) || empty($password)) {
            
            error_log("Error de registro: Todos los campos son obligatorios.");
            self::showRegisterForm(); // Mostrar el formulario de nuevo
            return;
        }

        //Validar que el correo sea válido
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            error_log("Error de registro: El formato del correo electrónico no es válido.");
            self::showRegisterForm();
            return;
        }

        //Verificar si el correo ya está registrado
        if (User::findByCorreo($correo)) {
            error_log("Error de registro: El correo electrónico ya está en uso.");
            self::showRegisterForm();
            return;
        }

        //Crear el nuevo usuario
        try {
            $newUser = User::create(
                nombre: $nombre,
                correo: $correo,
                plain_password: $password
            );
            
            //Guardar el usuario en la base de datos
            if ($newUser->save()) {
                // Registro exitoso. Redirigir al login con un mensaje de éxito.
                error_log("Éxito: Usuario registrado correctamente.");
                header('Location: /login');
                exit();
            } else {
                error_log("Error de registro: No se pudo guardar el usuario en la base de datos.");
                self::showRegisterForm();
            }

        } catch (Error $e) {
            // Capturar cualquier error inesperado durante la creación/ guardado
            error_log("Error de registro: " . $e->getMessage());
            self::showRegisterForm();
        }
    }

    public static function logout()
    { /* ... ... */
    }
}
