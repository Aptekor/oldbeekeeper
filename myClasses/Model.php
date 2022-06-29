<?php
namespace myClasses;

use myClasses\BaseDB;
use myClasses\Uploader;


abstract class Model{

    public $db;
    public $Upload;

    public function __construct(){


        $this->db = new BaseDB;
        $this->db->destroySession();
        $this->Upload = new Uploader;
    }


}
?>