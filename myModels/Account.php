<?php

namespace myModels;
use myClasses\Model;



class Account extends Model{

    public $result;


    public function regist () {
        $this->db->reg();
    }


    public function in_put() {
        $this->db->autoriz();
    }

    public function my_profil() {
        $myprofil = $this->db->profil();
        return $myprofil;
    }

    public function profil_Article() {
        $myArticle = $this->db->profilArticle() ;
        return $myArticle;
    }

}
?>