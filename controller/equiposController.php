<?php
require_once './model/equiposModel.php';
require_once './view/equiposView.php';
require_once './helpers/auth.helper.php';
class equiposController{
    private $model;
    private $view;
    private $helper;
    function __construct()
    {
        $this->model = new equiposModel();
        $this->view = new equiposView();
        $this->helper = new AuthHelper();

    }
    function obtenerequipo(){
        $equipos=$this-> model->obtenerequipo();
        $this->view->mostrarequipos($equipos);
        
    }
    
    function eliminarequipos($id){
        $this->helper->checkLoggedIn();
        $this->model->eliminarequipos($id);
        header("Location: " . BASE_URL );
    }
public function agregarequipo(){
    $this->helper->checkLoggedIn();
    if(empty($_POST['equipo'])||empty($_POST['nacionalidad'])){
        header("Location: " . BASE_URL );
    }
    else { 
        $equipo = $_POST['equipo'];
        $pais = $_POST['nacionalidad'];
        $this->model->agregarequipolaDB($equipo,$pais);
        header("Location: " . BASE_URL );
    }
    }
    public function borrarequipo($id){
        $this->helper->checkLoggedIn();
        $this->model->eliminarequipo($id);
        header("Location: " . BASE_URL );
    }
    public function showformeditquipo($id){
        $this->helper->checkLoggedIn();
        $this->view->showeditformequipo($id);
    }
    public function editarequiposentero($id){
        $this->helper->checkLoggedIn();
        $data = new stdClass();
        if(empty($_POST['nacionalidad'])||empty($_POST['equipo'])){
            header("Location: " . BASE_URL );
        }    
        else{

        
        $data->equipo = $_POST['equipo'];
        $data->nacionalidad = $_POST['nacionalidad'];
        $this->model->editarequipodelaDB($data,$id);
        header("Location: " . BASE_URL );
         }
    }
        
}
