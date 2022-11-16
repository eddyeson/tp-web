<?php
require_once './model/jugadoresModel.php';
require_once './view/jugadoresView.php';
require_once './helpers/auth.helper.php';
require_once './model/equiposModel.php';
class jugadoresController{
    private $model;
    private $view;
    private $helper;
    private $modelequipo;
    function __construct()
    {
        $this->model = new jugadoresModel();
        $this->view = new jugadoresView();
        $this->helper = new AuthHelper();
        $this->modelequipo = new equiposModel();
    }
    function obtenerjugadores(){
        $jugador=$this->model->obtenerjugadoresModel();
        $equipo = $this->obtenerequipo();
        $this->view->mostrarjugadores($jugador,$equipo);
    }

    function detallesDejugador($id){
        $jugadorDetail=$this->model->detallesDejugador($id);
        //var_dump($jugadorDetail);
        $this->view->mostrarDetalle($jugadorDetail);
    }

    function jugadoresdeeseequipo($id){
        $jugadoresdeeseequipo=$this->model->jugadoreseneseteequipo($id);
        $this->view->jugadoresdeequipo($jugadoresdeeseequipo);
    }
    function eliminarjugador($id){
        $this->helper->checkLoggedIn();
        $this->model->eliminarjugador($id);
        header("Location: " . BASE_URL );
    }
    public function agregarjugador()
    {
        $this->helper->checkLoggedIn();
        if (!(empty($_POST['nombre']) || empty($_POST['sensibilidad']) || empty($_POST['dpi']) || empty($_POST['rango']) || empty($_POST['id_equipo']) || empty($_POST['rol']))) {
            $nombre = $_POST['nombre'];
            $sensibilidad = $_POST['sensibilidad'];
            $dpi = $_POST['dpi'];
            $rango = $_POST['rango'];
            $equipo = $_POST['id_equipo'];
            $rol = $_POST['rol'];
            $this->model->agregarjugadoralaDB($nombre, $sensibilidad, $dpi, $rango, $equipo, $rol);
        }
        header("Location: " . BASE_URL);
    }
    function obtenerequipo(){
        $equipos=$this-> modelequipo->obtenerequipo();
        return $equipos;
    }
    public function editarjugador($id){
        $this->helper->checkLoggedIn();
        $equipo= $this->obtenerequipo();
        $jugador = $this->detallesDejugador($id);
        $this->view->showeditform($id,$equipo,$jugador);
    }
    public function editarjugadores($id){
        $this->helper->checkLoggedIn();
        if(empty($_POST['nombre'])||empty($_POST['sensibilidad'])||empty($_POST['dpi'])||empty($_POST['rango'])||empty($_POST['equipo'])||empty($_POST['rol'])){
            header("Location: " . BASE_URL );
        }
        else{
        $data = new stdClass();
        $data->nombre = $_POST['nombre'];
        $data->sensibilidad = $_POST['sensibilidad'];
        $data->dpi = $_POST['dpi'];
        $data->rango = $_POST['rango'];
        $data->equipo = $_POST['equipo'];
        $data->rol = $_POST['rol'];
        $this->model->editarjugadordelaDB($data,$id);
        header("Location: " . BASE_URL );
      }
    }
    
}
    