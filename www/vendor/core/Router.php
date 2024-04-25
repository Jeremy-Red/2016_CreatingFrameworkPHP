<?php
class Router
{
    protected static $routes = []; //it consists list all routes
    protected static $route = [];
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            $controller = self::$route['controller'];
            $controller = self::upperCamelCase($controller);
            if (class_exists($controller)) {
                $cObj = new $controller;
                $action = self::$route['action'];
                $action = self::lowerCamelCase($action);
                $action = $action . 'Action';
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                } else {
                    echo "Method {$controller}::{$action} is not exist";
                }
            } else {
                echo "Controller {$controller} is not exist";
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }
    protected static function upperCamelCase($name)
    {
        $name = strtolower($name);
        $name = str_replace('-', ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);
        return $name;
    }
    protected static function lowerCamelCase($name)
    {
        $name = self::upperCamelCase($name);
        $name = lcfirst($name);
        return $name;
    }
}