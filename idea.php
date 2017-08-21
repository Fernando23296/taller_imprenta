<?php
require_once 'model/database.php';

$controller = 'dea'; //CAMBIADO por cliente

if(!isset($_REQUEST['dea'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->deaIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['dea']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'deaIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}