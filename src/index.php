<?php 
require_once __DIR__ . '/load_env.php';
require_once './lib/Route.php';
require_once './database.php';
require_once './auth/auth.php';
include_once "./lib/Session.php";
use Src\Auth\AuthController;
use Lib\Route;

Route::get('/', [AuthController::class, 'showLoginForm']);
Route::get('/login',[AuthController::class, 'showLoginForm']);
Route::post('/login',[AuthController::class, 'handleLoginPost']);
Route::get('/register', [AuthController::class,'showRegisterForm']);
Route::post('/register',[AuthController::class, 'handleRegisterPost']);

Route::get('/dashboard',function(){
    $file_path = __DIR__ . '/home/dashboard/dashboard.php';
    include $file_path;
}, protected:true);

Route::get('/logout',[AuthController::class,'logout'], protected:true);


Route::dispatch();

?>