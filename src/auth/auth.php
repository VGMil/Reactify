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
        if($data['password'] != '' && $data['correo'] != ''){
            $user = User::findByCorreo($data['correo']);
            if($user){
                // TODO:Session
                print_r($user);
            }else{
                self::showLoginForm();
            }
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
