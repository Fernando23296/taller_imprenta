<?php
require_once 'model/database.php';

$controller = 'der'; //CAMBIADO por cliente

if(!isset($_REQUEST['der'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->derIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['der']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'derIndex';

    // Instanciamoss el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}