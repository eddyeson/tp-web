<?php
require_once './model/equiposModel.php';
require_once './view/equiposView.php';

class equiposController{
    private $model;
    private $view;
    function __construct()
    {
        $this->model = new equiposModel();
        $this->view = new equiposView();
       /*  session_start(); */

    }
    function obtenerequipo(){
        $equipos=$this-> model->obtenerequipo();
        $this->view->mostrarequipos($equipos);
        
    }

  
}