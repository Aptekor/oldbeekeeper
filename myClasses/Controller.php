<?php
namespace myClasses;

use myClasses\View;
use myClasses\Model;
use myModels\Main;

abstract class Controller {
    public $route;
    public $view;
    protected $model;
    protected $path;

    public function __construct(/*$route*/ $route){
    $this->view = new View();
    $this->model = $this->loadModel($route['1']);
    $this->route = $route;

    }


    public function loadModel($name){
        if ($name == "") {
            $path = 'myModels\\'.'Main';
        }else { $path = 'myModels\\'.ucfirst($name);}

            if (class_exists($path)) {
               return new $path();
            }
    }



}
?>