<?php

class Route {

    private static $routes = Array();
    private static $pathNotFound = null;
    private static $methodNotAllowed = null;

    public static function add($expression, $function, $method = 'get')
    {
        array_push(self::$routes,Array(
          'expression' => $expression,
          'function' => $function,
          'method' => $method
        ));
    }

    public static function pathNotFound($function)
    {
        self::$pathNotFound = $function;
    }
    
    public static function methodNotAllowed($function)
    {
        self::$methodNotAllowed = $function;
    }

    public static function run($basepath = '/')
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']); // parseando url encontrada
    
        // se a url não é encontrada retornamos a url padrão '/'
        if(isset($parsedUrl['path']))
            $path = $parsedUrl['path'];
        else
            $path = '/';
        
        // recebendo o método do request ( POST, PUT, DELETE, GET )
        $method = $_SERVER['REQUEST_METHOD'];
        
        // boolean parse
        $pathMatchFound = false;
        $routeMatchFound = false;
    }
}
