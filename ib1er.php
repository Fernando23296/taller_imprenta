<?php
require_once 'model/database.php';

$controller = 'b1er'; //CAMBIADO por cliente

if(!isset($_REQUEST['b1er'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->b1erIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['b1er']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'b1erIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}