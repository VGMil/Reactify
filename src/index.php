<?php 

require_once './lib/Route.php';
use Lib\Route;

Route::get('/', function () {
    $login_file_path = __DIR__ . '/auth/Login/Login.php';
    include $login_file_path;
});
Route::get('/login',function(){
    $login_file_path = __DIR__ . '/auth/Login/Login.php';
    include $login_file_path;
});
Route::get('/register',function(){
    $login_file_path = __DIR__ . '/auth/Register/Register.php';
    include $login_file_path;
});

Route::dispatch();

?>