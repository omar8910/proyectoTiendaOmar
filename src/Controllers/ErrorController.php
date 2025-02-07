<?php
namespace Controllers;
use Lib\Pages;

class ErrorController{
    private Pages $pages;

    public function __construct(){
        $this->pages = new Pages();
    }

    public function error404(){
        // die("Estamos en el metodo error404");
        $this->pages->render('errores/errores', ['mensajeError' => 'La página que buscas no existe']);
    }
}


?>