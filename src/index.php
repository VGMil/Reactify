<?php 
require_once __DIR__ . '/load_env.php';
require_once './lib/Route.php';
require_once './database.php';
use Lib\Route;

Route::get('/', function () {
    $file_path = __DIR__ . '/auth/Login/Login.php';
    include $file_path;
});
Route::get('/login',function(){
    $file_path = __DIR__ . '/auth/Login/Login.php';
    include $file_path;
});
Route::get('/register',function(){
    $file_path = __DIR__ . '/auth/Register/Register.php';
    include $file_path;
});
Route::get('/dashboard',function(){
    $file_path = __DIR__ . '/home/dashboard/dashboard.php';
    include $file_path;
});

Route::dispatch();

?>