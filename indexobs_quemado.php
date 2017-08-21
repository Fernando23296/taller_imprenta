<?php
require_once 'model/database.php';

$controller = 'obsq';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['oq']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->ObsqIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['oq']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ObsqIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}