<?php
require_once 'model/database.php';

$controller = 'aet'; //CAMBIADO por cliente

if(!isset($_REQUEST['aet'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->aetIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['aet']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'aetIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}