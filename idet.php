<?php
require_once 'model/database.php';

$controller = 'det'; //CAMBIADO por cliente

if(!isset($_REQUEST['det'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->detIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['det']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'detIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}