<?php
namespace myClasses;


use myClasses\View;
use myModels\Main;


class Router{

     public function run(){
        $url = $_SERVER['REQUEST_URI'];
        $parse = parse_url($url, PHP_URL_PATH);
        $route = explode('/', $parse);

        $path = 'myControl\\' . ucfirst($route['1']) . 'Controllers';

        if ($route['1'] == "") {
            $path = 'myControl\\' . 'Main' . 'Controllers';
                }else
                    {$path = 'myControl\\' . ucfirst($route['1']) . 'Controllers';}

                if (class_exists($path)) {

                    if ($route['1'] == "") {
                        $action = 'main'.'Action';
                        }else {
                              $action = $route['1'].'Action';}

                    if (method_exists($path, $action)) {
                        $controller = new $path($route);
                        $controller->$action();
                    }

                }

     }

}
?>