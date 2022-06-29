<?php
namespace myControl;

use myClasses\Controller;
use myClasses\BaseDB;

class AccountControllers extends Controller {

    public function accountAction(){

        if (!isset($_SESSION['user'])) {
            $this->view->path = 'body';
            $this->model->in_put();
            $this->model->regist();
            $this->view->render('Регистрация');

        } else{
            $this->view->path = 'profil';
            $myprofil = $this->model-> my_profil();
            $myArticle = $this->model->profil_Article();

            $this->view->render('Profil', [$myArticle], [$myprofil]);
        }

    }

}
?>