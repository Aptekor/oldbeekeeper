<?php
namespace myControl;

use myClasses\Controller;
use myModels\Main;
use myClasses\BaseDB;


class MainControllers extends Controller {


    public function mainAction(){

        $this->model->in_put();
        $this->view->path = '/body';
        $results = $this->model->news();
        $serche = $this->model-> serche_all();
        $this->view->render('', [$results], [$serche]);






        }

}
?>