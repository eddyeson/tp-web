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

/* Posicionate en la carpeta donde tengas el proyecto y tira el comando
chmod -R 777 templates_c
chmod -R 777 libs/smarty-4.2.1
chmod es para dar los permisos y con -R le decís que haga lo mismo con todo lo que tenga 
adentro, si no te anda tiraselo a todo el proyecto y fue */

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

session_start();
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
    case 'validacion':
        $authController = new AuthController();
        $authController->validacionUser();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'borrar':
        $jugadoresController = new jugadoresController();
        $id = $params[1];
        $jugadoresController->eliminarjugador($id);
        break;
    case 'add':
        $jugadoresController = new jugadoresController();
        $jugadoresController->agregarjugador();
        break;
    default:
        echo ('404 Page not found');
        break;
}
