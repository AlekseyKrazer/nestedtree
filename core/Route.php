<?php
namespace core;

/**
 * Class Route
 */

class Route
{
    public static function start()
    {
        // контроллер и действие по умолчанию
        $controllerName = 'Tree';
        $actionName = 'Index';

        // парсим с url данные в какой контроллер идти
        $route=str_replace("r=", "", $_SERVER['QUERY_STRING']);
        $routes = explode('/', $route);

        // получаем имя контроллера
        if (!empty($routes[0])) {
            $controllerName = $routes[0];
        }
        // получаем имя экшена
        if (!empty($routes[1])) {
            $actionName = $routes[1];
        }

        // добавляем префиксы
        $controllerName = 'Controller'.ucfirst($controllerName);
        $actionName = 'action'.ucfirst($actionName);

        // подцепляем файл с классом контроллера
        $controllerFile = $controllerName.'.php';
        $controllerPath = "controllers/".$controllerFile;
        if (file_exists($controllerPath)) {
            include "controllers/".$controllerFile;
        } else {
            die("Страницы не существует");
        }

        $controllerClass="Controllers\\".$controllerName;
        // создаем контроллер
        $controller = new $controllerClass;
        $action = $actionName;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            die("Страницы не существует");
        }
    }
}
