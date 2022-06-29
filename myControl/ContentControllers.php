<?php
namespace myControl;

use myClasses\Controller;
use myClasses\BaseDB;
use myModels\Content;
use myModels\Uploads;

class ContentControllers extends Controller {


    public function contentAction(){
        $route = $this->route;


            if (!isset($route['2'])){
                    if(!isset($_SESSION['user'])) {
                        $this->view->path = 'error/400';
                        $this->view->render('');}

                    else {

                        $this->view->path = 'blog/Article';
                        $this->model->inputArticle();
                        $this->view->render('');}

            } else {
                 $this->view->path = 'blog/page';
                 $this->model->cometsAllArticle();
                 $this->model->cometsDel();
                 $this->model->redOneArticle();
                 $this->model->delOneArticle();

                 $ComentsToArticle = $this->model->showCometsAllArticle();
                 $article = $this->model->one_Article ();
                 $oneComentRed = $this->model->redComets();

                // $loadImage = $this->model->Uploads();
                 $this->model->Uploads();


                 $this->view->render('Article',
                                     [$ComentsToArticle],
                                     [$article],
                                     [$oneComentRed]
                                     /*[$loadImage]*/);
            }


    }

}
?>