<?php
require_once 'model/database.php';

$controller = 'ara'; //CAMBIADO por cliente

if(!isset($_REQUEST['ara'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->araIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['ara']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'araIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}