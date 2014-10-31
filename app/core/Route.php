<?php

class Route
{
    static function showError()
    {
        require_once 'app/Controller/NotFoundController.php';

        $NotFoundController = 'NotFoundController';
        $NotFoundAction = 'indexAction';

        $Controller = new $NotFoundController;
        if(method_exists($Controller, $NotFoundAction)) {
            $Controller->$NotFoundAction();
        }
    }

    static function start()
    {
        // defaults
        $nameController = 'Index';
        $nameAction = 'index';
        $params = null;

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // get controller's name
        if (!empty($routes[1])) {
            $nameController = $routes[1];
        }

        // get controller's action name
        if (!empty($routes[2])) {
            $nameAction = $routes[2];
        }

        if (!empty($routes[3])) {
            $params = $routes;
            unset($params[0], $params[1], $params[2]);
        }

        // create file associations
        $nameController = $nameController . 'Controller';
        $nameAction = $nameAction . 'Action';

        // get controller file
        $controllerFile = 'app/Controller/' . $nameController . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            $Controller = new $nameController;
            if(method_exists($Controller, $nameAction)) {
                $Controller->$nameAction($params);
            } else {
                Route::showError();
            }
        } else {
            Route::showError();
        }
    }
}