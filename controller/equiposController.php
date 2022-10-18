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
    
    function eliminarequipos($id){
        $this->model->eliminarequipos($id);
    }
    public function agregarequipo(){
        $equipo = $_POST['equipo'];
        $pais = $_POST['nacionalidad'];
        $this->model->agregarequipolaDB($equipo,$pais);
    }
    public function borrarequipo($id){
        $this->model->eliminarequipo($id);
    }
    public function showformeditquipo($id){
        $this->view->showeditformequipo($id);
    }
    public function editarequiposentero($id){
        $data = new stdClass();
        if(isset ($_POST['equipo']) ){ 
        $data->equipo = $_POST['equipo'];
        $data->nacionalidad = $_POST['nacionalidad'];
        $this->model->editarequipodelaDB($data,$id);
         }
    }
}