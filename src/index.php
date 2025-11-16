<?php 

require_once './lib/Route.php';
use Lib\Route;

Route::get('/',function(){
    echo 'Hola Mundo';
});

Route::dispatch();

?>