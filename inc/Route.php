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
}
