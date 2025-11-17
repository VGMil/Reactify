<?php
namespace Src\Auth;

include_once "./domain/User.php";
use Lib\Session;

use Error;
use User;

class AuthController
{
    public static function showLoginForm()
    { 
        $file_path = __DIR__ . '/Login/Login.php';
        include $file_path;
        $error = '';
        if(Session::has('_flash.login_error')) {
            $error = Session::getFlash('login_error');
        }else if(Session::has('_flash.logout')){
            $error = Session::getFlash('logout');
        }
        if($error !== ' ' || $error!== null){
            render_component("ui/Toast", [
            "children"=> $error,
            "variant"=> 'error'
            ]);
        }
    }
    public static function handleLoginPost()
    { 
        $correo = trim($_POST['correo'] ?? '');
        $password = trim($_POST['password'] ?? '');
        if(!empty($password) && !empty($correo)){
            $user = User::findByCorreo($correo);
            if($user && $user->verifyPassword($password)){
                Session::set('user', [
                    'id' => $user->id,
                    'nombre' => $user->nombre,
                    'correo' => $user->correo
                ]);
                error_log("Login exitoso. Bienvenido, " . htmlspecialchars($user->nombre));
                header('Location: /dashboard'); // Redirigir después del login
                exit();
            } else {
                Session::flash('login_error', 'Credenciales inválidas.');
                error_log("Credenciales invalidas");
                self::showLoginForm();
            }
        } else {
            Session::flash('login_error', 'Por favor, completa todos los campos.');
            error_log("Campos vacíos") ;
            error_log("Por favor, completa todos los campos.");
            self::showLoginForm();
        }
    }

    public static function showRegisterForm()
    { 
        $file_path = __DIR__ . '/Register/Register.php';
        include $file_path;
        if(Session::has('_flash.register_error')) {
            render_component("ui/Toast", [
            "children"=> Session::getFlash("register_error"),
            "variant"=> 'error'
            ]);
        }
    }
  public static function handleRegisterPost()
    { 
        // 1. Obtener y limpiar los datos del formulario
        $nombre = trim($_POST['nombre'] ?? '');
        $correo = trim($_POST['correo'] ?? '');
        $password = trim($_POST['password'] ?? '');

        //Validación básica en el lado del servidor
        if (empty($nombre) || empty($correo) || empty($password)) {
            Session::flash('register_error', 'Todos los campos son obligatorios.');
            error_log("Error de registro: Todos los campos son obligatorios.");
            self::showRegisterForm(); // Mostrar el formulario de nuevo
            return;
        }

        //Validar que el correo sea válido
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            Session::flash('register_error', 'El formato del correo electrónico no es válido.');
            error_log("Error de registro: El formato del correo electrónico no es válido.");
            self::showRegisterForm();
            return;
        }

        //Verificar si el correo ya está registrado
        if (User::findByCorreo($correo)) {
            Session::flash('register_error', 'El correo electrónico ya está en uso.');
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
                Session::flash('registered', '¡Usuario registrado correctamente! Ahora puedes iniciar sesión.');
                error_log("Éxito: Usuario registrado correctamente.");
                header('Location: /login');
                exit();
            } else {
                Session::flash('register_error', 'Ocurrió un error al registrar el usuario.');
                error_log("Error de registro: No se pudo guardar el usuario en la base de datos.");
                self::showRegisterForm();
            }

        } catch (Error $e) {
            // Capturar cualquier error inesperado durante la creación/ guardado
            Session::flash('register_error', $e->getMessage());
            error_log("Error de registro: " . $e->getMessage());
            self::showRegisterForm();
        }
    }

    public static function logout(){ 
        Session::destroy();
        Session::flash('logout', 'Se ha cerrado Sesion');
        header('Location: /login');
        exit();
    }

}
