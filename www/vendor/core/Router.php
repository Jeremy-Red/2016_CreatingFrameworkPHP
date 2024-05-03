<?php
namespace vendor\core;

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
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\';
            $controller .= self::$route['prefix'];
            $controller .= self::$route['controller'];
            $controller .= 'Controller';
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::$route['action'];
                $action = self::lowerCamelCase($action);
                $action = $action . 'Action';
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    throw new \Exception("Method <b>{$controller}::{$action}</b> is not exist", 404);
                }
            } else {
                throw new \Exception("Controller <b>{$controller}</b> is not exist", 404);
            }
        } else {
            throw new \Exception("Page <b>{$url}</b> is not found", 404);
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
    protected static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (strpos($params[0], '=') === false) {
                $params[0] = rtrim($params[0], '/');
                return $params[0];
            } else {
                return '';
            }
        }
    }
}