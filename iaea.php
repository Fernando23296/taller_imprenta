<?php
require_once 'model/database.php';

$controller = 'aea'; //CAMBIADO por cliente

if(!isset($_REQUEST['aea'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->aeaIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['aea']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'aeaIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}