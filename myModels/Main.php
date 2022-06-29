<?php

namespace myModels;
use myClasses\Model;



class Main extends Model{

    public $result;

    public function news(){
        $result = $this->db->viewArticle();
        return $result;
    }


    public function in_put() {
        $this->db->autoriz();
    }


    public function serche_all(){

        $serche = $this->db->serche();
        return $serche;
    }

}
?>