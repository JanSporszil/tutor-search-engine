<?php

require_once 'public/controllers/DefaultController.php';

class Routing {
    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function run($url) {
        $action = explode("/", $url)[0];

        if(!array_key_exists($action, self::$routes)) {
            // TODO create wrong url addres
            die("Wrong URL addres.");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        
        $object->$action();
    }

    

}