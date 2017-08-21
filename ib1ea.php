<?php
require_once 'model/database.php';

$controller = 'b1ea'; //CAMBIADO por cliente

if(!isset($_REQUEST['b1ea'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->b1eaIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['b1ea']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'b1eaIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}