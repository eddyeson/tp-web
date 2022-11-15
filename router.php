<?php


require_once './controller/equiposController.php';
require_once './controller/jugadoresController.php';
require_once './controller/authController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// leemos la accion que viene por parametro
$action = 'home'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}


$params = explode('/', $action);


// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $jugadoresController = new jugadoresController();
        $equiposController = new equiposController();
        $jugadoresController->obtenerjugadores();
        $equiposController->obtenerequipo();
        break;
    case 'detalles':
        $jugadoresController = new jugadoresController();
        $id = $params[1];
        $jugadoresController->detallesDejugador($id);
        break;
    case 'jugadores'://jugadores
        $jugadoresController = new jugadoresController();
        $id = $params[1];
        $jugadoresController->jugadoresdeeseequipo($id);
        break;
    case 'login':
        $authController = new AuthController();
        $authController->mostrarForm();
        break;
    case 'validation':
        $authController = new AuthController();
        $authController->validationUsers();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'borrar-jugador':
        $jugadoresController = new jugadoresController();
        $id = $params[1];
        $jugadoresController->eliminarjugador($id);
        break;
    case 'add':
        $jugadoresController = new jugadoresController();
        $jugadoresController->agregarjugador();
        break;
    case 'showedit':
        $jugadoresController = new jugadoresController();
        $id = $params[1];
        $jugadoresController->editarjugador($id);
        break;
    case 'edit':
        $jugadoresController = new jugadoresController();
        $id = $params[1];
        $jugadoresController->editarjugadores($id);
        break;    
    case 'agregarequipo':
        $equiposController = new equiposController();
        $equiposController->agregarequipo();
        break;
    case 'borrar-equipo':
        $equiposController = new equiposController();
        $id = $params[1];
        $equiposController->borrarequipo($id);
        break;    
    case 'showeditequipo':
        $equiposController = new equiposController();
        $id = $params[1];
        $equiposController->showformeditquipo($id);
        break;
    case 'editarequipos':
        $equiposController = new equiposController();
        $id = $params[1];
        $equiposController->editarequiposentero($id);
        break;
    default:
        echo ('404 Page not found');
        break;
}
