<?php
require_once './model/jugadoresModel.php';
require_once './view/jugadoresView.php';

class jugadoresController{
    private $model;
    private $view;
    function __construct()
    {
        $this->model = new jugadoresModel();
        $this->view = new jugadoresView();
    }
    function obtenerjugadores(){
        $jugador=$this->model->obtenerjugadoresModel();
        $this->view->mostrarjugadores($jugador);
    }
    function detallesDejugador($id){
        $jugadorDetail=$this->model->detallesDejugador($id);
        var_dump($jugadorDetail);
        $this->view->mostrarDetalle($jugadorDetail);
    }
    function jugadoresdeeseequipo($id){
        $jugadoresdeeseequipo=$this->model->jugadoreseneseteequipo($id);
        $this->view->mostrarjugadores($jugadoresdeeseequipo);
    }
    function eliminarjugador($id){
        $this->model->eliminarjugador($id);
        header('Location: '. BASE_URL);
    }
    public function agregarjugador(){
        $nombre = $_POST['nombre'];
        $sensibilidad = $_POST['sensibilidad'];
        $dpi = $_POST['dpi'];
        $rango = $_POST['rango'];
        $equipo = $_POST['equipo'];
        $rol = $_POST['rol'];

        $this->model->agregarjugadoralaDB($nombre,$sensibilidad,$dpi,$rango,$equipo,$rol);
        header('Location: '. BASE_URL);
    }
  
}