<?php
require_once 'model/database.php';

$controller = 'b2er'; //CAMBIADO por cliente

if(!isset($_REQUEST['b2er'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->b2erIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['b2er']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'b2erIndex';

    // Instanciamoss el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}