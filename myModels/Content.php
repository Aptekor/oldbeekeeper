<?php
namespace myModels;
use myClasses\Model;



class Content extends Model{

    public function inputArticle () {
        $this->db->blogArticle ();
    }

    public function one_Article () {
        $article = $this->db->oneArticle();
        return $article;
    }

    public function cometsAllArticle()  {
         $this->db->cometsArticle();
    }

    public function redComets()  {
        return $this->db->redCometsArticle();
    }


    public function showCometsAllArticle()  {
         $ComentsToArticle = $this->db->showCometsArticle();
         return $ComentsToArticle;
    }


    public function delOneArticle() {
        $this->db-> DelArticle ();
    }


    public function redOneArticle () {
        $this->db-> redArticle ();
    }

    public function cometsDel() {
        $this->db->cometsArticleDel();
    }


    public function Uploads () {
       $this->Upload->imageLoads();
       //$image = $this->Upload->imageLoads();
       //return  $image;
    }


}
?>