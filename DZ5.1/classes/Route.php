<?php


class Route
{
    public static $validRoutes = array();
    public static function get($route, $function)
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            self::$validRoutes[] = $route;
            if (isset($_GET['url'])) {
                if ($_GET['url'] == $route) {
                    if (is_array($function)) {
                        $controller = new $function[0]();
                        $func = $function[1];
                        $controller->$func($_GET);
                    } else {
                        $function->__invoke($_GET);
                    }
                }
            }
        }
    }

    public static function post($route, $function)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_GET['url'])) {
                if ($_GET['url'] == $route) {
                    if (is_array($function)) {
                        $controller = new $function[0]();
                        $func = $function[1];
                        $controller->$func($_POST);
                    } else {
                        $function->__invoke($_POST);
                    }
                }
            }
        }
    }

    public static function put($route, $function)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_method']) && $_POST['_method'] == 'PUT') {
            if (isset($_GET['url'])) {
                if ($_GET['url'] == $route) {
                    if (is_array($function)) {
                        $controller = new $function[0]();
                        $func = $function[1];
                        $controller->$func($_POST);
                    } else {
                        $function->__invoke($_POST);
                    }
                }
            }
        }
    }
    public static function delete($route, $function)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['_method']) && $_POST['_method'] == 'DELETE') {
            if (isset($_GET['url'])) {
                if ($_GET['url'] == $route) {
                    if (is_array($function)) {
                        $controller = new $function[0]();
                        $func = $function[1];
                        $controller->$func($_POST);
                    } else {
                        $function->__invoke($_POST);
                    }
                }
            }
        }
    }


}