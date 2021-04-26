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
        if (isset($parsedUrl['path']))
            $path = $parsedUrl['path'];
        else
            $path = '/';
        
        // recebendo o método do request ( POST, PUT, DELETE, GET )
        $method = $_SERVER['REQUEST_METHOD'];
        
        // boolean parse
        $pathMatchFound = false;
        $routeMatchFound = false;

        foreach(self::$routes as $route) {
    
            // recebendo o basePath e parseando após percorrer
            if($basepath!=''&&$basepath!='/')
                $route['expression'] = '('.$basepath.')'.$route['expression'];
        
            $route['expression'] = '^'.$route['expression'];
            $route['expression'] = $route['expression'].'$';
        
            // validando o path
            if (preg_match('#'.$route['expression'].'#',$path,$matches)) {
                
                $pathMatchFound = true;
        
                // Validando se com o regex bate com o método atual 
                if(strtolower($method) == strtolower($route['method'])) {
        
                    // sempre tiramos o primeiro elemento pois ele retorna toda a string
                    array_shift($matches);
            
                    if($basepath!=''&&$basepath!='/')
                        array_shift($matches); // Remove basepath
            
                    call_user_func_array($route['function'], $matches);
                    $routeMatchFound = true;
                    break;
                }
            }
        }
        
        // nenhuma rota encontrada
        if(!$routeMatchFound) {
            // um path aqui existe, mas não bate com o estilo do método
            if($pathMatchFound) {
                header("HTTP/1.0 405 Method Not Allowed");
                
                if(self::$methodNotAllowed)
                    call_user_func_array(self::$methodNotAllowed, Array($path,$method));

            }
            else {
                // rota não encontrada
                header("HTTP/1.0 404 Not Found");
                
                if(self::$pathNotFound)
                    call_user_func_array(self::$pathNotFound, Array($path));
            }
        }
    }
}
