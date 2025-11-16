<?php 

namespace Lib;

class Route {
    private static $routes =[];
    
    public static function get($uri, $callback,$protected=false){
        $uri = trim($uri, '/');
        self::$routes['GET'][$uri] = [
            'callback'=>$callback,
            'protected'=>$protected
        ];
    }

    public static function post($uri, $callback,$protected=false){
        $uri = trim($uri, '/');
        self::$routes['POST'][$uri] = [
            'callback'=>$callback,
            'protected'=>$protected
        ];
    }

    public static function dispatch(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');

        $method = $_SERVER['REQUEST_METHOD'];
        if(isset(self::$routes[$method][$uri])){
            $route = self::$routes[$method][$uri];
            $callback = $route['callback'];
            
            if($route['protected']){
                if (!Session::has('user')) {
                    header('Location: /login');
                    exit();
                }
            }else{
                if (Session::has('user')) {
                    header('Location: /dashboard');
                    exit();
                }
            }
            $callback();
        }else{
            echo 'Not Found';
        }
    }
}
?>