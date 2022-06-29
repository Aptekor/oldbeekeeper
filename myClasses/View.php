<?php

namespace myClasses;

class View {

    public $path;
    public $route;
    public $layout = 'head';


    public function render ($title,
                            $vars=[],
                            $vars1=[],
                            $vars2=[],
                            $vars3=[],
                            $vars4=[]) {

        ob_start();
        require 'static/'. $this->path.'.php';
        $content = ob_get_clean();
        require 'static/'.$this->layout.'.php';
        }

    public static function errorCode($code) {
        http_response_code($code);
        require 'static/error/'.$code.'.php';
        exit();
    }

}
?>